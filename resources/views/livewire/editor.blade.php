<div>
    <!-- The editor -->
    <div>
        <h2>Editor</h2>
        <x-editor wire:model="content" style="border:1px solid red" />
    </div>

    <!-- Preview what the editor is creating -->
    <div>
        <h2>Preview</h2>
        <p>{{$content}}</p>
    </div>
</div>