<div>
    <!-- The editor -->
    <div class="w-3/4 m-auto py-4 px-8 bg-white shadow-lg rounded-lg my-8">
        <!-- <h2>Editor</h2> -->
        <x-editor wire:model="content" />
    </div>

    <!-- Preview what the editor is creating -->
    <div class="w-3/4 m-auto py-4 px-8 bg-white shadow-lg rounded-lg my-8">
        <h2>Preview</h2>
        <p>{{$content}}</p>
    </div>
</div>