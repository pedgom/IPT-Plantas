@can('adminFullApp')
- ## Manual super administrador NÃO ESTA A SER USADO
    - [Início](/{{route}}/{{version}}/super-admin/overview)
@elsecan('adminApp')
- ## Manual de administração NÃO ESTA A SER USADO
    - [Início](/{{route}}/{{version}}/admin/overview)
@elsecan('manageApp')
- ## Manual de gestão NÃO ESTA A SER USADO
    - [Início](/{{route}}/{{version}}/manager/overview)
@elsecan('accessAsUser')
- ## Manual cliente NÃO ESTA A SER USADO
    - [Início](/{{route}}/{{version}}/user/overview)
@endcan
@guest
- ## Cliente não autenticado NÃO ESTA A SER USADO
    - [Início](/{{route}}/{{version}}/guest/overview)
@endguest
