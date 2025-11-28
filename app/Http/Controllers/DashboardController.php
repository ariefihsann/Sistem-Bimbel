<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Materi;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
{
    $user = auth()->user();

    $totalCourses = Module::count();
    
    $totalMateri = Materi::count();
  
    $totalCompleted = \DB::table('materi_user')
        ->where('user_id', $user->id)
        ->count();

    $overallProgress = $totalMateri > 0
        ? round(($totalCompleted / $totalMateri) * 100)
        : 0;

    // Progress per module 
    $modules = Module::with('materis')->get();

    foreach ($modules as $module) {

        $total = $module->materis->count();

        $completed = \DB::table('materi_user')
            ->where('user_id', $user->id)
            ->whereIn('materi_id', $module->materis->pluck('id'))
            ->count();

        $module->completed_text = "$completed / $total";

        $module->progress_percentage =
            $total > 0 ? round(($completed / $total) * 100) : 0;

        $module->status_text =
            $completed == 0 ? 'Belum dimulai' :
            ($completed == $total ? 'Selesai' : 'Sedang berjalan');
    }


    return view('dashboard', compact(
        'modules',
        'totalCourses',
        'totalCompleted',
        'overallProgress'
    ));
}
    public function admin()
{
    return view('admin.dashboard', [
        'totalUsers'   => User::count(),
        'totalModules' => Module::count(),
        'totalMateri'  => Materi::count(),
        'modules'      => Module::all()
    ]);
}

}