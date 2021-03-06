<nav class="menu-left" id="menu-left">
    <div class="clientName"></div>
    <div class="scroll">
        <ul class="menu" id="mainMenu">
            <li>
                <div class="item"><i class="fas fa-user-tie"></i>Список клиентов<i class="fas fa-sort-down"></i></div>
                <ul class="sub-menu" id="campaignRoster">
                    <li id="openInvite"><i class="fas fa-user-plus" style="font-size:1rem;padding-right:10px;"></i> Создать приглашение</li>
                    @foreach($clients as $client)
                        <li id="{{$client->id}}">
                            {{$client->name}}
                        </li>
                    @endforeach
                </ul>

            </li>
            <li>
                <div class="item"><i class="fas fa-list"></i>Список кампаний<i class="fas fa-sort-down"></i></div>
                <ul class="sub-menu" id="campaignList">
                    <li id="chAllCamp">Все кампании</li>
                    @isset($campaigns)
                        @foreach($campaigns as $campaign)
                            <li id="{{$campaign->id}}">{{$campaign->name}}</li>
                        @endforeach
                    @endisset
                </ul>
            </li>
        </ul>
    </div>
</nav>
