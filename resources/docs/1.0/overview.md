@can('adminFullApp')

# Início NÃO ESTA A SER USADO

---

- [Definir os tipos de documentação](#tipos-documentacao)
- [Permissões para documentação](#documentacao-permissoes)

<a name="tipos-documentacao"></a>
## Definir os tipos de documentação

O laravel starter Metronic 8 com Laravel 9 vêm preparado com documentação por role, ou seja, cada code poderá ter a sua própria documentação.

É importante desativar ou escrever corretamente a documentação para cada um dos roles, e definir no ficheiro index.md o menu da esquerda da documentação.

Deve também replicar o conteúdo que está no ficheiro overview de cada pasta de um role para o overview.md global e colocar dentro da respetiva permissão, isto é algo redundante e na realidade podiamos deixar de ter um overview dentro de cada pasta e só ter nestas pastas da documentação por role outros especificos. Isto acontece porque na root da pasta da documentação precisamos sempre ter o ficheiros index.md e o overview.md


<a name="documentacao-permissoes"></a>
## Permissões para documentação

Ir ao ficheiro *AuthServiceProvider* e colocar correctamente as permissões.


@elsecan('adminApp')

# Início NÃO ESTA A SER USADO

---

- [Como começar](#como-comecar)

<a name="como-comecar"></a>
## Como começar

Colocar aqui as instruções para o administrador.. 🦊

  
@elsecan('manageApp')

# Início NÃO ESTA A SER USADO

---

- [Como começar](#como-comecar)

<a name="como-comecar"></a>
## Como começar

Colocar aqui as instruções para o gestor.. 🦊

@elsecan('accessAsUser')

# Início NÃO ESTA A SER USADO

---

- [Como começar](#como-comecar)

<a name="como-comecar"></a>
## Como começar

Colocar aqui as instruções para o cliente.. 🦊


@endcan
@guest

# Início NÃO ESTA A SER USADO

---

- [Como começar](#como-comecar)

<a name="como-comecar"></a>
## Como começar

Colocar aqui as instruções para utilizadores sem login.. 🦊


@endguest
