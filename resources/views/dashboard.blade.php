
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-4">
        <div class="w-full p-4 lg:w-80">
            <div class="p-8 bg-white rounded shadow-md">
                <h2 class="text-2xl font-bold text-gray-800"><a class="underline" href="https://www.newworld-map.com/">NewWorld
                        Map</a></h2>
                <p class="text-gray-600">New World Map is an interactive map for the MMO PC game from Amazon Games. The
                    goal is to provide New World players with as much information as possible about the location of
                    resources to make their game more enjoyable.</p>
            </div>
        </div>
        <div class="w-full p-4 lg:w-80">
            <div class="p-8 bg-white rounded shadow-md">
                <h2 class="text-2xl font-bold text-gray-800"><a class="underline" href="https://www.cloudping.info/">CloudPing</a>
                </h2>
                <p class="text-gray-600">This site allows you to perform an HTTP ping to measure the network latency
                    from your browser to the various Amazon Web Services™ datacenters around the world.</p>
            </div>
        </div>
        <div class="w-full p-4 lg:w-80">
            <div class="p-8 bg-white rounded shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">
                    <a class="underline" href="https://nwdb.info/db/gatherables/fishing/page/1">Gatherables -
                        Fishing</a></h2>
                <p class="text-gray-600">New World Database contains all the information about items, quests, crafting
                    recipes, perks, abilities and much more</p>
            </div>
        </div>
        <div class="w-full p-4 lg:w-80">
            <div class="p-8 bg-white rounded shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">
                    <a class="underline" href="https://docs.google.com/spreadsheets/d/139UvmN9GQusBQbomfw_MgqdDLxtpJGlcviC2AOMZcVQ/edit#gid=1066385794">Trade
                        Skill Recipes</a></h2>
                <p class="text-gray-600">Thanks for viewing my google sheet! Goal is to become the ultimate crafting
                    sheet.
                    Latest link/version can always be found on my website ** newworldprofessions.com **
                    Document is currently a WIP and being updated for Launch!
                </p>
            </div>
        </div>
        <div class="w-full p-4 lg:w-80">
            <div class="p-8 bg-white rounded shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">
                    <a class="underline" href="https://newworld.fandom.com/wiki/New_World_Wiki">NewWorld Wiki</a></h2>
                <p class="text-gray-600">This wiki is a collaborative resource for the game and is maintained by the
                    contributions of the fans
                </p>
            </div>
        </div>
        <div class="w-full p-4 lg:w-80">
            <div class="p-8 bg-white rounded shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">
                    <a class="underline" href="https://nwdb.info/experience-table">Experience Table</a></h2>
                <p class="text-gray-600">Check the experience needed for any character, crafting, refining or gathering
                    level, along with some of their bonuses. New World Database contains all the information about
                    items, quests, crafting recipes, perks, abilities and much more
                </p>
            </div>
        </div>
        <div class="w-full p-4 lg:w-80">
            <div class="p-8 bg-white rounded shadow-md">
                <h2 class="text-2xl font-bold text-gray-800">
                    <a class="underline" href="https://www.newworld.com/en-us/support/server-status">Server Status</a></h2>
                <p class="text-gray-600">Check the status of the NewWorld servers.
                </p>
            </div>
        </div>
    </div>

    <div class="container grid grid-cols-3 gap-2 mx-auto">
        @foreach([
    'Quick Start' => 'https://cdn.discordapp.com/attachments/866113854055514112/888111326285688862/tlaqgb07evn71.png',
    'title2' => 'https://cdn.discordapp.com/attachments/866113854055514112/890058794355261500/bzlt4brs4wo71.png',
    'Dexterity' => 'https://cdn.discordapp.com/attachments/866113854055514112/874654064951050270/NW_Dexterity.gif',
    'Intelligence' => 'https://cdn.discordapp.com/attachments/866113854055514112/874654107762307072/NW_Intelligence.gif',
    'Focus' => 'https://cdn.discordapp.com/attachments/866113854055514112/874654151475331173/NW_Focus.gif',
    'Constitution' => 'https://cdn.discordapp.com/attachments/866113854055514112/874654209537114152/NW_Constitution.gif',
    'Strength' => 'https://cdn.discordapp.com/attachments/866113854055514112/874533696512868372/quick_reference.gif'
    ] as $alt => $link)
        <div class="w-full p-4 lg:w-80 rounded">
            <img src="<?=$link;?>" alt="<?=$alt;?>">
        </div>
        @endforeach
    </div>
</x-app-layout>
