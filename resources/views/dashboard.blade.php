<x-app-layout>
    <x-slot name="header">
        <div class="container" 
     style="background-image: url('https://scontent.fpbc1-2.fna.fbcdn.net/v/t39.30808-6/480687515_1025463609436167_8305326327093689456_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=f727a1&_nc_ohc=ERSdRsBXWqUQ7kNvwE6ewVd&_nc_oc=AdneEMQ7y3gWlblPMKeBEfeFC6SfwKmnoMpju-w-B1ndf60h-5OdBC26C0o5EdtCnew&_nc_zt=23&_nc_ht=scontent.fpbc1-2.fna&_nc_gid=peXABPxkAqZdklDR6ZOnpw&oh=00_AfX1LchkLh9k0_NgLrWQCgc3IBp2cdbkuaS0gt7aCuF-ow&oe=68AC9DC6'); 
            background-size: cover; 
            background-position: center; 
            min-height: 100vh;">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        {{ __("Haz ingresado al sistema!")  }}
    </div>
</x-app-layout>
