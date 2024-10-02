* Medicos(id, funcionario_id, cpf, crm, especializacao, isDiretor)
* Enfermeiros(id, funcionario_id, cpf, coren)
* Laboratoristas(id, funcionario_id, cpf, cbo)
* Administrativos(id, funcionario_id, cpf, cbo)
* Recepcionistas(id, funcionario_id, cpf)

# Refazer o Front [ok]
 * Users(id, name, email, password, cargo)
 * Funcionarios(id, nome, user_id, telefone, salario)
 * Pacientes(id, cpf, nome, telefone, data_nascimento, genero, contato_emergencia, estado_civil) 
 * Dividas(id, valor, cobrador)
 * Cobranças(id, valor, devedor)

...

@section('title', 'Cobranças')

## Implementar
* Consultas(id, medico_id, paciente_id, data-consulta, descricao)

... 
Verificar os Modelos que serão Implementados
Migration -> Model -> Controller -> Front

