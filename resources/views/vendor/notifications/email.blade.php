@component('mail::message')

@lang('Olá!')

<br><br>Você está recebendo esta mensagem porque nós recebemos uma requisição de recuperação de senha para a sua conta.

@component('mail::button', ['url' => $actionUrl, 'color' => 'blue'])
{{ __('Restaurar senha') }}
@endcomponent

<br>Se você não requisitou uma recuperação de senha, nenhuma outra ação é requerida

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Abraços'),<br>{{ __('Administração do site IRR.') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
@lang(
    "Se você estiver tendo problemas ao clicar no botão de recuperação de senha, copie e cole a URL abaixo na barra de endereços do seu navegador: "
)
[{{ $actionUrl }}]({!! $actionUrl !!})
@endcomponent
@endisset
@endcomponent
