<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8 border border-gray-200">
                <!-- Título -->
                <h2 class="text-4xl font-extrabold text-blue-600 mb-6 text-center">Calculadora - Método Ingenuo (Google Charts Dinámico)</h2>
                
                <!-- Formulario de entrada -->
                <form id="ingenuoForm" action="{{ route('metodo.ingenuo.calculate') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2" for="series_name">Nombre de la Serie (opcional)</label>
                        <input type="text" name="series_name" id="series_name" 
                               class="px-4 py-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-400" 
                               placeholder="Ejemplo: Ventas Mensuales">
                    </div>
                    
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2" for="historical_values">Valores Históricos (separados por comas)</label>
                        <input type="text" name="historical_values" id="historical_values" 
                               class="px-4 py-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-400" 
                               placeholder="Ejemplo: 100, 105, 110, 95, 120">
                        <small class="text-gray-500 block mt-1">Ingresa los valores separados por comas.</small>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700 mb-2" for="start_date">Fecha de Inicio del Pronóstico</label>
                        <input type="date" name="start_date" id="start_date" 
                               class="px-4 py-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700 mb-2" for="frequency">Frecuencia de los Datos</label>
                        <select name="frequency" id="frequency" 
                                class="px-4 py-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="Mensual">Mensual</option>
                            <option value="Anual">Anual</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700 mb-2" for="color">Color de la Línea del Gráfico</label>
                        <input type="color" name="color" id="color" 
                               class="px-4 py-2 border border-gray-300 rounded-md w-32 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-bold py-3 px-8 rounded-md shadow-lg transition duration-300">
                            Calcular Pronóstico
                        </button>
                    </div>
                </form>

                <!-- Área para mostrar el resultado -->
                <div id="result" class="mt-8 p-4 bg-green-50 border border-green-200 rounded-md text-center text-green-700 font-semibold"></div>

                <!-- Área para la gráfica -->
                <div class="mt-10">
                    <div id="forecastChart" class="w-full h-96"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Incluir Google Charts para la gráfica -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    google.charts.load('current', { packages: ['corechart'] });

    document.getElementById('ingenuoForm').addEventListener('submit', async function (event) {
        event.preventDefault();  // Evita que el formulario se envíe de forma tradicional

        // Obtiene los datos del formulario
        const formData = new FormData(this);
        const response = await fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'  // Token CSRF para seguridad
            }
        });

        if (response.ok) {
            const data = await response.json();
            console.log("Datos recibidos:", data);

            document.getElementById('result').innerHTML = `
                <h3 class="text-lg">Resultado</h3>
                <p>Pronóstico para el próximo período: <strong>${data.forecast}</strong></p>
            `;

            // Obtiene el color del gráfico desde el formulario
            const color = document.getElementById('color').value || '#3498db';

            // Llama a la función de Google Charts para dibujar el gráfico
            google.charts.setOnLoadCallback(function() {
                drawChart(data.historical_values, data.forecast, data.series_name, color);
            });
        } else {
            document.getElementById('result').innerHTML = `<p class="text-red-500 font-semibold">Error al procesar los datos. Verifica los valores ingresados.</p>`;
        }
    });

    // Función para dibujar el gráfico
    function drawChart(historicalValues, forecast, seriesName = "Serie de Tiempo", color = '#3498db') {
        // Construir datos en el formato de Google Charts
        const chartData = [['Período', 'Valor']];
        historicalValues.forEach((value, index) => {
            chartData.push([`Periodo ${index + 1}`, value]);
        });
        chartData.push(['Pronóstico', forecast]);

        const data = google.visualization.arrayToDataTable(chartData);

        const options = {
            title: `Pronóstico - ${seriesName}`,
            curveType: 'function',
            legend: { position: 'top' },
            colors: [color],
            hAxis: {
                title: 'Período'
            },
            vAxis: {
                title: 'Valor'
            }
        };

        const chart = new google.visualization.LineChart(document.getElementById('forecastChart'));
        chart.draw(data, options);
    }
</script>
