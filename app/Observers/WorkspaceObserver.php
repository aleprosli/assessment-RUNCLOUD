<?php

namespace App\Observers;

use App\Models\Workspace;
use Illuminate\Support\Str;

class WorkspaceObserver
{
    public function creating(Workspace $workspace)
    {
        $workspace->uuid=Str::uuid();
    }
}
