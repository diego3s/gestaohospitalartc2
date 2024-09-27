* Users(id, name, email, password, cargo)
* Funcionarios(id, nome, user_id, telefone, salario)

* Medicos(id, cpf, crm, especializacao, isDiretor)
* Enfermeiros(id, cpf, coren)
* Laboratoristas(id, cpf, cbo)
* Administrativos(id, cbo)
* Recepcionistas(id, cpf)

* Pacientes(id, cpf, nome, telefone, data_nascimento, genero, contato_emergencia, estado_civil)

### trocar 'a pagar' e 'a receber' por  Dividas e Cobrancas
* **Dividas(id, valor, cobrador)**
* **Cobranças(id, valor, devedor)**

## Implementar
* Consultas(id, medico_id, paciente_id, data-consulta, descricao)
 

 Dar refresh nas migrations
 Fazer os models
 front por último