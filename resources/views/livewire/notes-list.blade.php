<div>
    @if ($isListMode)
        <button class="btn btn-sm btn-primary" wire:click="addMode()">Add Note</button>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="row mt-3">
            <div class="col-12">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Ketik Pencarian" wire:model="keyword">
                </div>
            </div>
            @forelse ($notes as $item)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">{{ $item->content }}</p>
                            <button wire:click="edit({{ $item->id }})" class="btn btn-primary">Edit</button>
                            <button wire:click="delete({{ $item->id }})" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-info">
                            Note masih kosong
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    @else
        <button class="btn btn-sm btn-primary" wire:click="listMode()">List Note</button>
        <div class="card mt-3">
            <div class="card-header">
                <h5>Add Note</h5>
            </div>
            <div class="card-body mt-3">
                <form wire:submit.prevent="save">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <textarea type="title" class="form-control @error('title') is-invalid @enderror" wire:model="title"></textarea>
                        <div class="invalid-feedback">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea type="content" class="form-control @error('content') is-invalid @enderror" wire:model="content"></textarea>
                        <div class="invalid-feedback">
                            @error('content')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-sm btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    @endif
</div>
