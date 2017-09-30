@extends('layouts.site')

@section('content')
<div id="voting" data-sound="{{ asset('/sounds/end.mp3') }}" data-register="{{ route('register') }}">
    <h3 id="subtitle">{{ $research->title }}</h3>

    <h2 class="separator">Apuração:</h2>
    <div id="result">
        <div id="candidates">
            <?php $allVotes = $research->votes->count(); ?>
            @foreach($research->candidates as $candidate)
                <?php
                    $itVotes = $candidate->votes->count();
                    $percent = $allVotes > 0 ? (100 / $allVotes) * $itVotes : 0;
                ?>
                <div class="candidate" style="padding-left:{{ $percent < 88 ? $percent : 88 }}%">
                    <img src="{{ asset($candidate->image) }}" alt="{{ $candidate->name }}" title="{{ $candidate->name }}" class="photo">
                    <div class="real">{{ number_format($itVotes, 0, '', '.') }} votos ({{ number_format($percent, 2, ',', '') }}%)</div>
                    <strong class="percent">{{ round($percent) }}%</strong>
                </div>
            @endforeach
        </div>
    </div>
    <div id="ad-header" class="ad-body">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Voz do Eleitor - Cabeçalho -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:728px;height:90px"
             data-ad-client="ca-pub-7850745796390818"
             data-ad-slot="6718410383"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    </div>
    <h2 class="separator">Vote você também:</h2>
    <div id="ad-right">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Voz do Eleitor - Lateral -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:300px;height:600px"
             data-ad-client="ca-pub-7850745796390818"
             data-ad-slot="1213968119"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    </div>
    <div id="machine">
        <div id="candidates">
            @foreach($research->candidates as $candidate)
                @if($candidate->party != '')
                    <div class="candidate">
                        <img src="{{ asset($candidate->image) }}" alt="{{ $candidate->name }}" title="{{ $candidate->name }}" class="photo">
                        <div class="name">{{ $candidate->name }}</div>
                        <div class="number">{{ $candidate->number }}</div>
                    </div>
                @endif
            @endforeach
        </div>
        <div id="screen">
            <img src="{{ asset('images/candidates/doria.jpg') }}" alt="" id="candidate_photo">
            <div id="label_header"><span id="label_title">Seu voto para</span></div>
            <div id="label_role">Presidente</div>
            <div id="label_number"><span class="label">Número:</span> <span id="number1"></span> <span id="number2"></span></div>
            <div id="label_wrong">Número errado</div>
            <div id="label_null">Voto nulo</div>
            <div id="label_name"><span class="label">Nome:</span> <span id="name"></span></div>
            <div id="label_party"><span class="label">Partido:</span> <span id="party"></span></div>
            <div id="label_info">Aperte a tecla:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VERDE para CONFIRMAR este voto<br>&nbsp;&nbsp;LARANJA para REINICIAR este voto</div>
            <div id="label_end">Fim</div>
        </div>
        <div id="keyboard">
            <div class="line">
                <button id="btn_1" class="btn" style="width:73px;height:58px;">1</button>
                <button id="btn_2" class="btn" style="width:68px;height:58px;">2</button>
                <button id="btn_3" class="btn" style="width:69px;height:58px;">3</button>
            </div>
            <div class="line">
                <button id="btn_4" class="btn" style="width:73px;height:60px;">4</button>
                <button id="btn_5" class="btn" style="width:68px;height:60px;">5</button>
                <button id="btn_6" class="btn" style="width:69px;height:60px;">6</button>
            </div>
            <div class="line">
                <button id="btn_7" class="btn" style="width:73px;height:58px;">7</button>
                <button id="btn_8" class="btn" style="width:68px;height:58px;">8</button>
                <button id="btn_9" class="btn" style="width:69px;height:58px;">9</button>
            </div>
            <div class="line">
                <button id="btn_0" class="btn" style="width:80px;height:51px;">0</button>
            </div>
            <div class="line">
                <button id="btn_white" class="btn" style="width:90px;height:59px;">Branco</button>
                <button id="btn_clear" class="btn" style="width:90px;height:59px;">Corrige</button>
                <button id="btn_confirm" class="btn" style="width:94px;height:66px;">Confirma</button>
            </div>
        </div>
    </div>
    <div id="ad-middle" class="ad-body">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
             style="display:inline-block;width:728px;height:90px"
             data-ad-client="ca-pub-7850745796390818"
             data-ad-slot="9951255998"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>    </div>
    <h2 class="separator" style="margin-top:80px">Comentários:</h2>
    <div class="fb-comments" data-href="https://vozdoeleitor.com" data-numposts="100" data-width="100%"></div>
    <div id="ad-footer" class="ad-body">
        <script language="JavaScript1.1" src="https://t.dynad.net/script/?dc=5550002447;ord=1506692870765;idt_product=9;idt_url=325412;idt_label=84947;idt_category=16;click="></script>
    </div>
    <div id="loading"></div>
</div>

@endsection

@section('scripts')
    <script><?php

        if ($canVote) {

            echo "var data = '" . $research->candidates->toJson() . "';";

        }

    ?></script>
@endsection
