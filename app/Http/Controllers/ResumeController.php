<?php

namespace App\Http\Controllers;

use App\DataObjects\Resume;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function index(Factory $view)
    {
        $resume = Storage::disk('resume')->get('resume.json');
        $resumeData = json_decode($resume, true);

        return $view->make('resume', ['resume' => Resume::fromArray($resumeData)]);
    }
}
