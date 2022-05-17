# Início

---

- [Definir os tipos de documentação](#tipos-documentacao)
- [Permissões para documentação](#documentacao-permissoes)

<a name="tipos-documentacao"></a>
## Definir os tipos de documentação

O laravel starter Metronic 8 vêm preparado com documentação por role, ou seja, cada code poderá ter a sua própria documentação.

É importante desativar ou escrever corretamente a documentação para cada um dos roles, e definir no ficheiro index.md o menu da esquerda da documentação, o ficheiro index.md que está na root da pasta não é usado.
Os links no ficheiro index.md devem ser sempre os locais e não ter nada a referênciar o tipo de role.

**Já não é necessário** - Deve também replicar o conteúdo que está no ficheiro overview de cada pasta de um role para o overview.md global e colocar dentro da respetiva permissão, isto é algo redundante e na realidade podiamos deixar de ter um overview dentro de cada pasta e só ter nestas pastas da documentação por role outros especificos. Isto acontece porque na root da pasta da documentação precisamos sempre ter o ficheiros index.md e o overview.md


<a name="documentacao-permissoes"></a>
## Permissões para documentação

Ir ao ficheiro *AuthServiceProvider* e colocar correctamente as permissões. Se for necessário criar mais roles com documentação diferente ou agrevar a documentação para vários roles numa só pasta devemos alterar o ficheiro Overrides/larecipe/Documentation.php, aqui temos definido que pastas são usadas dependendo do role.
