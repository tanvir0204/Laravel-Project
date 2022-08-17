@if (session()->has('msg'))
    
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2500)" x-show="show">
        <div id="msg" class="fixed top-0 transform bg-green-500 text-white px-48 py-3 left-1/2 -translate-x-1/2">
            <p >
                {{session('msg')}}
            </p>
        </div>
    </div>

    <script>
        let msg = document.getelement
    </script>
@endif