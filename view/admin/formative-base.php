<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação de Horas Formativas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        .card-custom {
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-card {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .profile-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">3276452 - Validação de Horas Formativas</h1>
        <div class="row">
            <!-- Informações do Evento -->
            <div class="col-md-8">
                <div class="card card-custom">
                    <h5>Tipo de evento: <strong>Participação em Curso</strong></h5>
                    <p>Horas requisitadas: <strong>5 horas</strong></p>
                    <button class="btn btn-success">Ver Arquivo</button>
                </div>
                <div class="card card-custom mt-4">
                    <h5>Conclusão</h5>
                    <p>Selecione o professor para adicionar ao chamado</p>
                    <form action="confirm_process.php" method="POST">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="deferido" value="deferido">
                            <label class="form-check-label" for="deferido">Deferido</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="indeferido" value="indeferido">
                            <label class="form-check-label" for="indeferido">Indeferido</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="deferidoParcial" value="deferidoParcial">
                            <label class="form-check-label" for="deferidoParcial">Deferido Parcialmente</label>
                        </div>
                        <div class="mt-3">
                            <label for="justificativa" class="form-label">Justificativa:</label>
                            <textarea class="form-control" id="justificativa" name="justificativa" rows="3" required></textarea>
                        </div>
                        <div class="mt-3">
                            <label for="horasConcedidas" class="form-label">Horas Concedidas:</label>
                            <select class="form-select" id="horasConcedidas" name="horasConcedidas" required>
                                <option value="30">30 minutos</option>
                                <option value="1">1 hora</option>
                                <option value="2">2 horas</option>
                                <option value="3">3 horas</option>
                            </select>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Detalhes do Aluno -->
            <div class="col-md-4">
                <div class="profile-card">
                    <img src="https://via.placeholder.com/80" alt="Foto do Aluno">
                    <h5>Lucas Perussi</h5>
                    <p>Aluno - GRR123124124</p>
                    <p>lucasperussi@ufpr.br</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
