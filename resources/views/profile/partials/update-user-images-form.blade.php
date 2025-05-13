<section>
    <form id="profile-form" method="POST" action="{{route('upload.image')}}" enctype="multipart/form-data"
          class="hidden"> @csrf @method('PATCH') <label>
            <input id="profile-input" type="file" accept="image/*" name="image">
        </label>
    </form>
    <form id="cover-form" method="POST" action="{{route('upload.cover')}}" enctype="multipart/form-data"
          class="hidden"> @csrf @method('PATCH') <label>
            <input id="cover-input" type="file" accept="image/*" name="image">
        </label>
    </form>
    <div class="relative h-full">
        <div x-data="{ openSettings: false }" class="absolute right-12 mt-4 rounded-lg">
            <button x-on:click="openSettings = !openSettings"
                    class="border border-gray-400 p-2 rounded text-gray-300 hover:text-gray-300 bg-gray-100 bg-opacity-10 hover:bg-opacity-20"
                    title="Settings">
                <span class="material-icons">&#Xe5d4;</span>
            </button>
            <div x-show="openSettings" x-on:click.away="openSettings = false"
                 class="bg-white absolute right-0 w-40 py-2 mt-1 border border-gray-200 shadow-2xl"
                 style="display: none;">
                <p class="text-gray-400 text-xs px-6 uppercase mb-1">Settings</p>
                <button class="w-full flex items-center px-6 py-1.5 space-x-2 hover:bg-gray-200"
                        x-on:click="$('#profile-input').trigger('click')">
                    <span class="material-icons text-sm text-gray-400">&#xe3c9;</span>
                    <span class="text-sm text-gray-700">{{__("Change profile")}}</span>
                </button>
                <button class="w-full flex items-center px-6 py-1.5 space-x-2 hover:bg-gray-200"
                        x-on:click="$('#cover-input').trigger('click')">
                    <span class="material-icons text-sm text-gray-400">&#xe3c9;</span>
                    <span class="text-sm text-gray-700">{{__("Change cover")}}</span>
                </button>
            </div>
        </div>
        <div class="w-full h-[250px] bg-gray-200">
            <img alt="{{$user->name}} Cover Photo" id="cover-image" src="{{$cover??'#'}}"
                 class="w-full h-full rounded-tl-lg rounded-tr-lg object-cover">
        </div>
        <div class="flex flex-col items-center -mt-20">
            <img alt="{{$user->name}}" id="profile-image"
                 src="{{$filename??'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/510px-Default_pfp.svg.png'}}"
                 class="w-40 h-40 border-4 border-white rounded-full bg-gray-200 object-cover">
        </div>
    </div>
    <script type="module">
        $(document).ready(() => {
            $('#profile-input').change(() => {
                $('#profile-form').trigger('submit');
            })
            $('#cover-input').change(() => {
                $('#cover-form').trigger('submit');
            })
        })

        function changeImage(event, id) {
            $('#'.concat(id)).attr('src', URL.createObjectURL(event.target.files[0]));
        }
    </script>
</section>
