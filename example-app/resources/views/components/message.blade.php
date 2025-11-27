{{-- sail artisan make:component Messageにて、自作のコンポーネントを作る。Sec10-3P.307 --}}
@props(['message']){{-- sail artisan make:component Message を使わなくても、コンポーネントを作る宣言 --}}
{{-- あれ？上のコマンドを実行すると、.php、.blade.php両方ができるんじゃない？結局作って消すのかな？ --}}
@if ($message)
    <div class="p-4 m-2 rounded bg-green-100">
        {{ $message }}
        <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
        <!-- 「貧しいのは、持たざる者ではなく、より多くを欲する者である」ルキウス・アンナエウス・セネカ-->
    </div>
@endif
