@if($evaluation->project)
<a href="{{ Route('evaluation.process') }}?project_id={{ $evaluation->project->id }}" class="nominees-item">
    <div class="nominees-item-number text-6">{{ $loop->iteration }}</div>
    <div class="nominees-item-title text-6">{{ $evaluation->project->fio }}, {{ $evaluation->project->name }}</div>
    <div class="nominees-item-eval text-6">{{ $evaluation->completed ? '+' : '-' }}</div>
</a>
@endif