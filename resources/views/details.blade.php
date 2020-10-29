<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
			table { 
				width: 48%;
				margin-left:10%;
			}
			tr th { 
				text-align: left;
			}

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
	
        <div class="flex-center position-ref full-height">
			<table>
				<tr><td>
					<table class="table table-hover tabela-responsiva">
						<tr>
							<th scope="col"> Produto</th>
							<th scope="col"> Distância (Km) </th>
							<th scope="col"> Peso (Kg) </th>
						</tr>

						<tr scope="row">
							<td>{{ $entrega->brinde->nome }}</td>
							<td>{{ $entrega->distancia }}</td>
							<td>{{ $entrega->brinde->peso }}</td>
						</tr>
					
					</table>
				</td></tr>
			<tr><td>
				<table class="table table-hover tabela-responsiva">
					<tr>
						<th scope="col"> Modo de entrega</th>
						<th scope="col"> valor total </th>
					</tr>

					@foreach ($custos as $custo)
					<tr scope="row">
						<td>
							{{ $custo->modo->nomeEmpresa }}
						</td>
						<td>{{ 'R$' . number_format($custo->val, 2, ',', '.')  }}</td>
					</tr>
				
					@endforeach
				</table>
			</td></tr>
			<tr><td>
				<span><a href="/"><< Voltar</a></span>
			</td></tr>
        </div>
		
    </body>
</html>
