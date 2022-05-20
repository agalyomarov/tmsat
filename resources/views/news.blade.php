<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="format-detection" content="telephone=no" />
    <link rel="stylesheet" href="{{ asset('css/framework.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/js.js') }}"></script>
    <title></title>
</head>

<body>
    @include('includes.header')
    <section class="home">
        <div class="container clearfix">
            @include('includes.form_profile_mob')
            <h1 class="our_clients">Новости</h1>
            <div class="main_news">
                @if (isset($posts) && count($posts) > 0)
                    @foreach ($posts as $post)
                        <div class="item">
                            <p class="date">{!! $post->title !!}</p>
                            <p class="text">{!! $post->content !!}</p>
                        </div>
                    @endforeach
                @endif

                {{-- <div class="item">
                    <p class="date">10 декабря 2020</p>
                    <p class="text">
                        С другой стороны постоянный количественный рост и сфера нашей активности обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития. Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское
                        обеспечение нашей деятельности позволяет выполнять важные задания по разработке новых предложений. Разнообразный и богатый опыт консультация с широким активом позволяет выполнять важные задания по разработке направлений прогрессивного
                        развития. Значимость этих проблем настолько очевидна, что дальнейшее развитие различных форм деятельности обеспечивает широкому кругу (специалистов) участие в формировании форм развития. Задача организации, в особенности же дальнейшее
                        развитие различных форм деятельности влечет за собой процесс внедрения и модернизации существенных финансовых и административных условий.
                    </p>
                </div>
                <div class="item sale">
                    <p class="date">Новогодняя акция!! От 2021.12.25 до 2021.12.30</p>
                    <p class="text">
                        С другой стороны постоянный количественный рост и сфера нашей активности обеспечивает широкому кругу (специалистов) участие в формировании направлений прогрессивного развития. Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское
                        обеспечение нашей деятельности позволяет выполнять важные задания по разработке новых предложений. Разнообразный и богатый опыт консультация с широким активом позволяет выполнять важные задания по разработке направлений прогрессивного
                        развития. Значимость этих проблем настолько очевидна, что дальнейшее развитие различных форм деятельности обеспечивает широкому кругу (специалистов) участие в формировании форм развития. Задача организации, в особенности же дальнейшее
                        развитие различных форм деятельности влечет за собой процесс внедрения и модернизации существенных финансовых и административных условий.
                    </p>
                </div> --}}
            </div>
        </div>
    </section>
    <footer>
        <div class="container clearfix">
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <!----- УДАЛИТЬ СЛАЙДЕР ----->
</body>

</html>
