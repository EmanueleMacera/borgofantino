<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display the dashboard with all users visible to the logged-in user.
     *
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\Http\RedirectResponse
     */
    public function dashboard()
    {
        $currentUser = Auth::user();

        if (!$currentUser || !$currentUser instanceof User) {
            return redirect()->route('login')->with('error', __('general.not_authenticated'));
        }

        $users = User::all()->filter(function (User $user) use ($currentUser) {
            return $user->isVisibleTo($currentUser);
        });

        return view('admin.management.dashboard', compact('users'));
    }

    /**
     * Show the profile of the logged-in user.
     *
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        return view('admin.management.profile', ['user' => Auth::user()]);
    }

    /**
     * Update a user's role.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:' . implode(',', array_keys(User::ROLE_LEVELS)),
        ]);

        if (
            $request->role === User::ROLE_SUPER_PROGRAMMER &&
            $user->email !== env('SUPER_PROGRAMMER_EMAIL')
        ) {
            return redirect()->back()->with('error', __('general.do_not_match'));
        }

        if (auth()->user()->getRoleLevel() <= $user->getRoleLevel()) {
            return redirect()->back()->with('error', __('general.unauthorized_action'));
        }

        $user->update(['role' => $request->role]);

        return redirect()->route('dashboard')->with('success', __('general.updated_successfully'));
    }

    /**
     * Delete a user.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser(User $user)
    {
        if (!Auth::user()->canManage($user)) {
            return redirect()->back()->with('error', __('general.unauthorized_action'));
        }

        $user->delete();

        return redirect()->route('dashboard')->with('success', __('deleted.updated_successfully'));
    }

    /**
     * Create a new user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'confirm_email' => 'required|same:email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:' . implode(',', array_keys(User::ROLE_LEVELS)),
        ]);

        if (
            $request->role === User::ROLE_SUPER_PROGRAMMER &&
            $request->email !== env('SUPER_PROGRAMMER_EMAIL')
        ) {
            return response()->json(['error' => __('general.do_not_match')], 403);
        }

        if ($request->role !== User::ROLE_USER && auth()->user()->getRoleLevel() < User::ROLE_LEVELS[$request->role]) {
            return response()->json(['error' => __('general.unauthorized_action')], 403);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return response()->json(['success' => __('general.created_successfully')]);
    }

    /**
     * Approve a user.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approveUser(User $user)
    {
        if (!Auth::user()->canApprove($user)) {
            return redirect()->back()->with('error', __('general.unauthorized_action'));
        }

        $user->update(['is_approved' => true]);

        return redirect()->route('dashboard')->with('success', __('general.updated_successfully'));
    }

    /**
     * Check if the current password is correct.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkCurrentPassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            return response()->json(['valid' => true], 200);
        }

        return response()->json(['valid' => false], 400);
    }

    /**
     * Update the logged-in user's email.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateEmail(Request $request)
    {
        $request->validate([
            'new_email' => 'required|email|unique:users,email',
            'confirm_new_email' => 'required|same:new_email',
        ]);

        $user = Auth::user();

        if ($request->new_email === $user->email) {
            return response()->json(['error' => __('general.unauthorized_action')], 400);
        }

        $user->update(['email' => $request->new_email]);

        return response()->json(['success' => __('general.updated_successfully')]);
    }

    /**
     * Update the logged-in user's password.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['error' => __('general.do_not_match')], 400);
        }

        if (Hash::check($request->new_password, $user->password)) {
            return response()->json(['error' => __('general.unauthorized_action')], 400);
        }

        $user->update(['password' => Hash::make($request->new_password)]);

        return response()->json(['success' => __('general.updated_successfully')]);
    }

    /**
     * Update the logged-in user's name.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        if ($request->name === $user->name) {
            return response()->json('error', __('general.unauthorized_action'));
        }

        $user->update(['name' => $request->name]);

        return response()->json(['success' => __('general.updated_successfully')]);
    }

    /**
     * Display application logs with filtering and pagination.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function logs(Request $request)
    {
        $date = $request->input('date', now()->format('Y-m-d'));
        $logType = $request->input('log_type', ['error', 'warning', 'info']);
        $order = $request->input('order', 'desc');

        $logsPaginated = $this->paginateLogs($this->getLogs($date, $logType, $order), $request);

        return view('admin.management.logs', compact('logsPaginated', 'date', 'logType', 'order'));
    }

    /*
    |--------------------------------------------------------------------------
    | Private / Helper Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Retrieve and filter logs based on date and type.
     *
     * @param string $date
     * @param array $logType
     * @param string $order
     * @return \Illuminate\Support\Collection
     */
    private function getLogs($date, $logType, $order)
    {
        $logPath = storage_path('logs/laravel.log');

        if (!File::exists($logPath)) {
            return collect();
        }

        $logs = collect(File::lines($logPath))
            ->map(function ($line) {
                preg_match('/\[(.*?)\]\s*(.*?)\.(.*?):\s*(.*)/', $line, $matches);

                if (count($matches) === 5) {
                    return [
                        'date' => $matches[1],
                        'environment' => $matches[2],
                        'type' => strtolower($matches[3]),
                        'message' => $matches[4],
                    ];
                }

                return null;
            })
            ->filter(fn($log) => $log && strpos($log['date'], $date) !== false && in_array($log['type'], $logType));

        return $order === 'asc' ? $logs->sortBy('date') : $logs->sortByDesc('date');
    }

    /**
     * Paginate logs.
     *
     * @param \Illuminate\Support\Collection $logs
     * @param Request $request
     * @return LengthAwarePaginator
     */
    private function paginateLogs($logs, Request $request)
    {
        $perPage = 25;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        return new LengthAwarePaginator(
            $logs->slice(($currentPage - 1) * $perPage, $perPage)->values(),
            $logs->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url()]
        );
    }
}
