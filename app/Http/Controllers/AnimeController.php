<?php

namespace App\Http\Controllers;

use App\Anime;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class AnimeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


}