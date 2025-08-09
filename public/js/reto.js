// JavaScript para la página del reto de 30 días

document.addEventListener('DOMContentLoaded', function() {
    // Cargar los datos del usuario desde localStorage
    const userData = JSON.parse(localStorage.getItem('userData')) || {};
    
    // Mostrar el objetivo seleccionado por el usuario
    const objetivoElement = document.getElementById('objetivo-usuario');
    if (objetivoElement && userData.objetivo) {
        let objetivoTexto = '';
        
        switch(userData.objetivo) {
            case 'bajar_peso':
                objetivoTexto = 'PÉRDIDA DE PESO';
                break;
            case 'aumentar_masa':
                objetivoTexto = 'GANANCIA MUSCULAR';
                break;
            case 'definicion':
                objetivoTexto = 'DEFINICIÓN MUSCULAR';
                break;
            case 'fuerza':
                objetivoTexto = 'AUMENTO DE FUERZA';
                break;
            case 'resistencia':
                objetivoTexto = 'MEJORA DE RESISTENCIA';
                break;
            case 'flexibilidad':
                objetivoTexto = 'MEJORA DE FLEXIBILIDAD';
                break;
            case 'salud':
                objetivoTexto = 'SALUD GENERAL';
                break;
            case 'rendimiento':
                objetivoTexto = 'RENDIMIENTO DEPORTIVO';
                break;
            case 'recuperacion':
                objetivoTexto = 'RECUPERACIÓN';
                break;
            case 'habitos':
                objetivoTexto = 'HÁBITOS SALUDABLES';
                break;
            default:
                objetivoTexto = 'TRANSFORMACIÓN TOTAL';
        }
        
        objetivoElement.textContent = objetivoTexto;
        
        // Mostrar la pestaña correspondiente al objetivo
        if (userData.objetivo === 'bajar_peso') {
            cambiarTab('bajar');
            cambiarTabRutina('rutina-bajar');
            cambiarTabNutricion('nutricion-bajar');
        } else if (userData.objetivo === 'aumentar_masa') {
            cambiarTab('aumentar');
            cambiarTabRutina('rutina-aumentar');
            cambiarTabNutricion('nutricion-aumentar');
        }
    }
});

// Funciones para cambiar entre pestañas
function cambiarTab(tabId) {
    // Ocultar todas las pestañas
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Mostrar la pestaña seleccionada
    const selectedTab = document.getElementById(tabId);
    if (selectedTab) {
        selectedTab.classList.add('active');
    }
    
    // Actualizar los botones
    const tabButtons = document.querySelectorAll('.tabs .tab-btn');
    tabButtons.forEach(button => {
        button.classList.remove('active');
    });
    
    // Activar el botón correspondiente
    const activeButton = document.querySelector(`.tab-btn[onclick="cambiarTab('${tabId}')"]`);
    if (activeButton) {
        activeButton.classList.add('active');
    }
}

function cambiarTabRutina(tabId) {
    // Ocultar todas las pestañas
    const tabContents = document.querySelectorAll('#rutinas .tab-content');
    tabContents.forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Mostrar la pestaña seleccionada
    const selectedTab = document.getElementById(tabId);
    if (selectedTab) {
        selectedTab.classList.add('active');
    }
    
    // Actualizar los botones
    const tabButtons = document.querySelectorAll('#rutinas .tabs .tab-btn');
    tabButtons.forEach(button => {
        button.classList.remove('active');
    });
    
    // Activar el botón correspondiente
    const activeButton = document.querySelector(`#rutinas .tab-btn[onclick="cambiarTabRutina('${tabId}')"]`);
    if (activeButton) {
        activeButton.classList.add('active');
    }
}

function cambiarTabNutricion(tabId) {
    // Ocultar todas las pestañas
    const tabContents = document.querySelectorAll('#nutricion .tab-content');
    tabContents.forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Mostrar la pestaña seleccionada
    const selectedTab = document.getElementById(tabId);
    if (selectedTab) {
        selectedTab.classList.add('active');
    }
    
    // Actualizar los botones
    const tabButtons = document.querySelectorAll('#nutricion .tabs .tab-btn');
    tabButtons.forEach(button => {
        button.classList.remove('active');
    });
    
    // Activar el botón correspondiente
    const activeButton = document.querySelector(`#nutricion .tab-btn[onclick="cambiarTabNutricion('${tabId}')"]`);
    if (activeButton) {
        activeButton.classList.add('active');
    }
}

// Función para actualizar día activo
function actualizarDiaActivo(tipo, dia) {
    // Obtener el contenedor de la semana correspondiente
    const tabContent = document.getElementById(`rutina-${tipo}`);
    if (!tabContent) return;
    
    // Remover clase active de todos los días
    const dias = tabContent.querySelectorAll('.dia');
    dias.forEach(diaElement => {
        diaElement.classList.remove('active');
    });
    
    // Agregar clase active al día seleccionado
    const diaSeleccionado = Array.from(dias).find((diaElement, index) => index + 1 === dia);
    if (diaSeleccionado) {
        diaSeleccionado.classList.add('active');
    }
}

// Función para mostrar detalles de rutina
function mostrarRutina(tipo, dia) {
    const detalleElement = document.getElementById(`detalle-rutina-${tipo}`);
    
    if (!detalleElement) return;
    
    // Actualizar estado activo de las tarjetas
    actualizarDiaActivo(tipo, dia);
    
    let contenido = '';
    
    if (tipo === 'bajar') {
        switch(dia) {
            case 1:
                contenido = `
                    <div class="rutina-detalle-activa">
                        <h3>DÍA 1: HIIT + CORE</h3>
                        <div class="rutina-detalle">
                            <div class="rutina-img">
                                <img src="img/Reto/Bajar/g7.png" alt="Rutina HIIT">
                            </div>
                            <div class="rutina-pasos">
                                <h4>CALENTAMIENTO (5 min)</h4>
                                <ul>
                                    <li>Movilidad articular general</li>
                                    <li>Trote suave en el sitio (2 min)</li>
                                    <li>Jumping jacks (30 seg)</li>
                                    <li>Sentadillas sin peso (10 rep)</li>
                                </ul>
                                
                                <h4>CIRCUITO HIIT (4 rondas, 30 seg trabajo / 15 seg descanso)</h4>
                                <ul>
                                    <li>Burpees</li>
                                    <li>Mountain climbers</li>
                                    <li>Jumping squats</li>
                                    <li>Push-ups</li>
                                    <li>High knees</li>
                                </ul>
                                
                                <h4>CORE (3 rondas, 30 seg trabajo / 15 seg descanso)</h4>
                                <ul>
                                    <li>Plancha frontal</li>
                                    <li>Russian twists</li>
                                    <li>Bicycle crunches</li>
                                    <li>Leg raises</li>
                                </ul>
                                
                                <h4>ENFRIAMIENTO (5 min)</h4>
                                <ul>
                                    <li>Estiramientos generales</li>
                                    <li>Respiración profunda</li>
                                </ul>
                                
                                <p class="nota-importante">
                                    <strong>NOTA:</strong> Toma QUEMADOR GORILLA 30 minutos antes del entrenamiento y PROTEÍNA GORILLA inmediatamente después para maximizar resultados.
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                break;
            case 2:
                contenido = `
                    <div class="rutina-detalle-activa">
                        <h3>DÍA 2: FUERZA TREN INFERIOR</h3>
                        <div class="rutina-detalle">
                            <div class="rutina-img">
                                <img src="img/Reto/Bajar/g1.png" alt="Rutina Tren Inferior">
                            </div>
                            <div class="rutina-pasos">
                                <h4>CALENTAMIENTO (8 min)</h4>
                                <ul>
                                    <li>Movilidad específica de cadera y rodillas</li>
                                    <li>Sentadillas sin peso (15 rep)</li>
                                    <li>Zancadas alternadas (10 por pierna)</li>
                                    <li>Puentes de glúteo (12 rep)</li>
                                </ul>
                                
                                <h4>ENTRENAMIENTO PRINCIPAL (4 series)</h4>
                                <ul>
                                    <li>Sentadillas con peso (12-15 rep)</li>
                                    <li>Peso muerto rumano (12 rep)</li>
                                    <li>Zancadas con peso (10 por pierna)</li>
                                    <li>Extensiones de cuádriceps (15 rep)</li>
                                    <li>Curl femoral (15 rep)</li>
                                    <li>Elevaciones de pantorrilla (20 rep)</li>
                                </ul>
                                
                                <h4>FINALIZADOR (3 rondas)</h4>
                                <ul>
                                    <li>Sentadillas con salto (15 rep)</li>
                                    <li>Wall sit (30 seg)</li>
                                    <li>Descanso (60 seg entre rondas)</li>
                                </ul>
                                
                                <h4>ENFRIAMIENTO (5 min)</h4>
                                <ul>
                                    <li>Estiramientos de piernas</li>
                                    <li>Relajación muscular</li>
                                </ul>
                                
                                <p class="nota-importante">
                                    <strong>NOTA:</strong> Mantén la técnica correcta en todos los ejercicios. Toma CREATINA GORILLA post-entreno para mejor recuperación.
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                break;
            case 3:
                contenido = `
                    <div class="rutina-detalle-activa">
                        <h3>DÍA 3: CARDIO STEADY STATE</h3>
                        <div class="rutina-detalle">
                            <div class="rutina-img">
                                <img src="img/Reto/Bajar/g8.png" alt="Rutina Cardio">
                            </div>
                            <div class="rutina-pasos">
                                <h4>CALENTAMIENTO (5 min)</h4>
                                <ul>
                                    <li>Movilidad articular general</li>
                                    <li>Trote suave progresivo</li>
                                </ul>
                                
                                <h4>CARDIO PRINCIPAL (40 min)</h4>
                                <ul>
                                    <li>Cardio de intensidad moderada (60-70% FCM)</li>
                                    <li>Opciones: Caminadora, elíptica, bicicleta, natación o remo</li>
                                    <li>Mantén un ritmo constante que te permita hablar con cierta dificultad</li>
                                </ul>
                                
                                <h4>ENFRIAMIENTO (5 min)</h4>
                                <ul>
                                    <li>Reducción gradual de intensidad</li>
                                    <li>Estiramientos generales</li>
                                </ul>
                                
                                <p class="nota-importante">
                                    <strong>NOTA:</strong> Toma QUEMADOR GORILLA 30 minutos antes del cardio para maximizar la quema de grasa. Mantente hidratado con agua durante toda la sesión.
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                break;
            case 4:
                contenido = `
                    <div class="rutina-detalle-activa">
                        <h3>DÍA 4: FUERZA TREN SUPERIOR</h3>
                        <div class="rutina-detalle">
                            <div class="rutina-img">
                                <img src="img/Reto/Bajar/g3.png" alt="Rutina Tren Superior">
                            </div>
                            <div class="rutina-pasos">
                                <h4>CALENTAMIENTO (8 min)</h4>
                                <ul>
                                    <li>Movilidad de hombros y codos</li>
                                    <li>Rotaciones de brazos</li>
                                    <li>Push-ups de rodillas (10 rep)</li>
                                    <li>Band pull-aparts (15 rep)</li>
                                </ul>
                                
                                <h4>ENTRENAMIENTO PRINCIPAL (4 series)</h4>
                                <ul>
                                    <li>Press de pecho con mancuernas (12 rep)</li>
                                    <li>Remo con mancuernas (12 rep)</li>
                                    <li>Press militar (10 rep)</li>
                                    <li>Curl de bíceps (15 rep)</li>
                                    <li>Extensiones de tríceps (15 rep)</li>
                                    <li>Elevaciones laterales (12 rep)</li>
                                </ul>
                                
                                <h4>FINALIZADOR (3 rondas)</h4>
                                <ul>
                                    <li>Push-ups (máximo rep)</li>
                                    <li>Plancha (30 seg)</li>
                                    <li>Descanso (60 seg entre rondas)</li>
                                </ul>
                                
                                <h4>ENFRIAMIENTO (5 min)</h4>
                                <ul>
                                    <li>Estiramientos de brazos y hombros</li>
                                    <li>Relajación muscular</li>
                                </ul>
                                
                                <p class="nota-importante">
                                    <strong>NOTA:</strong> Controla el peso y la técnica. Toma BCAA GORILLA durante el entrenamiento para maximizar el rendimiento.
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                break;
            case 5:
                contenido = `
                    <div class="rutina-detalle-activa">
                        <h3>DÍA 5: CIRCUITO METABÓLICO</h3>
                        <div class="rutina-detalle">
                            <div class="rutina-img">
                                <img src="img/Reto/Bajar/g4.png" alt="Circuito Metabólico">
                            </div>
                            <div class="rutina-pasos">
                                <h4>CALENTAMIENTO (5 min)</h4>
                                <ul>
                                    <li>Movilidad articular completa</li>
                                    <li>Jumping jacks (30 seg)</li>
                                    <li>Sentadillas sin peso (15 rep)</li>
                                    <li>Push-ups de rodillas (10 rep)</li>
                                </ul>
                                
                                <h4>CIRCUITO METABÓLICO (5 rondas, mínimo descanso entre ejercicios)</h4>
                                <ul>
                                    <li>Kettlebell swings (20 rep)</li>
                                    <li>Battle ropes (30 seg)</li>
                                    <li>Box jumps o step-ups (15 rep)</li>
                                    <li>Remo (30 seg)</li>
                                    <li>Medicine ball slams (15 rep)</li>
                                    <li>Descanso 1 minuto entre rondas</li>
                                </ul>
                                
                                <h4>CORE (3 rondas)</h4>
                                <ul>
                                    <li>Plancha con toque de hombro (30 seg)</li>
                                    <li>Hollow hold (30 seg)</li>
                                    <li>Side plank rotations (10 por lado)</li>
                                </ul>
                                
                                <h4>ENFRIAMIENTO (5 min)</h4>
                                <ul>
                                    <li>Estiramientos generales</li>
                                    <li>Respiración profunda</li>
                                </ul>
                                
                                <p class="nota-importante">
                                    <strong>NOTA:</strong> Toma QUEMADOR GORILLA 30 minutos antes y BCAA GORILLA durante el entrenamiento para maximizar la quema de grasa y preservar músculo.
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                break;
            case 6:
                contenido = `
                    <div class="rutina-detalle-activa">
                        <h3>DÍA 6: RECUPERACIÓN ACTIVA</h3>
                        <div class="rutina-detalle">
                            <div class="rutina-img">
                                <img src="img/Reto/Bajar/g6.png" alt="Recuperación Activa">
                            </div>
                            <div class="rutina-pasos">
                                <h4>ACTIVIDAD DE BAJA INTENSIDAD (30-45 min)</h4>
                                <ul>
                                    <li>Caminata al aire libre</li>
                                    <li>Natación suave</li>
                                    <li>Yoga o pilates</li>
                                    <li>Ciclismo recreativo</li>
                                </ul>
                                
                                <h4>MOVILIDAD Y FLEXIBILIDAD (15-20 min)</h4>
                                <ul>
                                    <li>Foam rolling para principales grupos musculares</li>
                                    <li>Estiramientos estáticos (mantener 30 seg cada uno)</li>
                                    <li>Ejercicios de movilidad articular</li>
                                </ul>
                                
                                <p class="nota-importante">
                                    <strong>NOTA:</strong> La recuperación es tan importante como el entrenamiento. Asegúrate de mantenerte hidratado y considera tomar PROTEÍNA GORILLA para ayudar en la recuperación muscular.
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                break;
            case 7:
                contenido = `
                    <div class="rutina-detalle-activa">
                        <h3>DÍA 7: DESCANSO TOTAL</h3>
                        <div class="rutina-detalle">
                            <div class="rutina-img">
                                <img src="img/Reto/Bajar/g5.png" alt="Día de Descanso">
                            </div>
                            <div class="rutina-pasos">
                                <h4>DESCANSO COMPLETO</h4>
                                <p>Hoy es tu día de descanso completo. Tu cuerpo necesita tiempo para recuperarse y crecer más fuerte. Aprovecha este día para:</p>
                                <ul>
                                    <li>Descansar adecuadamente</li>
                                    <li>Asegurar una buena hidratación</li>
                                    <li>Mantener una alimentación limpia según tu plan nutricional</li>
                                    <li>Preparar mentalmente la semana siguiente</li>
                                </ul>
                                
                                <h4>RECOMENDACIONES</h4>
                                <ul>
                                    <li>Duerme al menos 7-8 horas</li>
                                    <li>Practica técnicas de relajación o meditación</li>
                                    <li>Evita el alcohol y comidas procesadas</li>
                                </ul>
                                
                                <p class="nota-importante">
                                    <strong>NOTA:</strong> Aunque es un día de descanso, mantén tu ingesta de PROTEÍNA GORILLA para asegurar una óptima recuperación muscular.
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                break;
            default:
                contenido = '<h3>Selecciona un día para ver el detalle de la rutina</h3>';
        }
    } else if (tipo === 'aumentar') {
        switch(dia) {
            case 1:
                contenido = `
                    <div class="rutina-detalle-activa">
                        <h3>DÍA 1: PECHO Y TRÍCEPS</h3>
                        <div class="rutina-detalle">
                            <div class="rutina-img">
                                <img src="img/Reto/Aumentar/image_fx_ (2).jpg" alt="Rutina Pecho y Tríceps">
                            </div>
                            <div class="rutina-pasos">
                                <h4>CALENTAMIENTO (8 min)</h4>
                                <ul>
                                    <li>Movilidad de hombros y codos</li>
                                    <li>Push-ups (10-15 rep)</li>
                                    <li>Band pull-aparts (15 rep)</li>
                                </ul>
                                
                                <h4>ENTRENAMIENTO PRINCIPAL</h4>
                                <ul>
                                    <li>Press de banca plano (4 series x 8-10 rep)</li>
                                    <li>Press inclinado con mancuernas (4 series x 10-12 rep)</li>
                                    <li>Aperturas en máquina o con cables (3 series x 12-15 rep)</li>
                                    <li>Fondos en paralelas para pecho (3 series x 8-12 rep)</li>
                                    <li>Press francés con barra EZ (4 series x 10-12 rep)</li>
                                    <li>Extensiones de tríceps con polea (3 series x 12-15 rep)</li>
                                    <li>Patada de tríceps (3 series x 15 rep)</li>
                                </ul>
                                
                                <h4>FINALIZADOR</h4>
                                <ul>
                                    <li>Superserie: Push-ups + Extensiones de tríceps con cuerda (3 rondas hasta el fallo)</li>
                                </ul>
                                
                                <h4>ENFRIAMIENTO (5 min)</h4>
                                <ul>
                                    <li>Estiramientos específicos de pecho y tríceps</li>
                                </ul>
                                
                                <p class="nota-importante">
                                    <strong>NOTA:</strong> Toma PRE-ENTRENO GORILLA 30 minutos antes y PROTEÍNA GORILLA inmediatamente después para maximizar el crecimiento muscular.
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                break;
            case 2:
                contenido = `
                    <div class="rutina-detalle-activa">
                        <h3>DÍA 2: ESPALDA Y BÍCEPS</h3>
                        <div class="rutina-detalle">
                            <div class="rutina-img">
                                <img src="img/Reto/Aumentar/g12.png" alt="Rutina Espalda y Bíceps">
                            </div>
                            <div class="rutina-pasos">
                                <h4>CALENTAMIENTO (8 min)</h4>
                                <ul>
                                    <li>Movilidad de hombros y columna</li>
                                    <li>Remo con banda elástica (15 rep)</li>
                                    <li>Superman (12 rep)</li>
                                    <li>Curl de bíceps con banda (15 rep)</li>
                                </ul>
                                
                                <h4>ENTRENAMIENTO PRINCIPAL</h4>
                                <ul>
                                    <li>Dominadas o jalones al pecho (4 series x 8-10 rep)</li>
                                    <li>Remo con barra (4 series x 10-12 rep)</li>
                                    <li>Remo con mancuerna a una mano (3 series x 10-12 rep por lado)</li>
                                    <li>Pull-over con mancuerna o polea (3 series x 12-15 rep)</li>
                                    <li>Curl de bíceps con barra (4 series x 10-12 rep)</li>
                                    <li>Curl martillo (3 series x 12 rep)</li>
                                    <li>Curl concentrado (3 series x 12 rep por brazo)</li>
                                </ul>
                                
                                <h4>FINALIZADOR</h4>
                                <ul>
                                    <li>Superserie: Jalones al pecho agarre cerrado + Curl de bíceps con cuerda (3 rondas hasta el fallo)</li>
                                </ul>
                                
                                <h4>ENFRIAMIENTO (5 min)</h4>
                                <ul>
                                    <li>Estiramientos específicos de espalda y bíceps</li>
                                </ul>
                                
                                <p class="nota-importante">
                                    <strong>NOTA:</strong> Toma PRE-ENTRENO GORILLA 30 minutos antes y BCAA GORILLA durante el entrenamiento para maximizar el rendimiento y la recuperación.
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                break;
            case 3:
                contenido = `
                    <div class="rutina-detalle-activa">
                        <h3>DÍA 3: DESCANSO O CARDIO SUAVE</h3>
                        <div class="rutina-detalle">
                            <div class="rutina-img">
                                <img src="img/Reto/Aumentar/g17.png" alt="Día de Descanso Activo">
                            </div>
                            <div class="rutina-pasos">
                                <h4>OPCIÓN 1: DESCANSO ACTIVO</h4>
                                <ul>
                                    <li>Caminata de 30-40 minutos</li>
                                    <li>Natación recreativa</li>
                                    <li>Yoga o estiramientos profundos</li>
                                </ul>
                                
                                <h4>OPCIÓN 2: CARDIO SUAVE (30 min)</h4>
                                <ul>
                                    <li>Cardio de baja intensidad (50-60% FCM)</li>
                                    <li>Opciones: Elíptica, bicicleta estática, caminadora en inclinación</li>
                                    <li>Mantén un ritmo que te permita mantener una conversación cómodamente</li>
                                </ul>
                                
                                <h4>RECUPERACIÓN</h4>
                                <ul>
                                    <li>Foam rolling para principales grupos musculares</li>
                                    <li>Estiramientos estáticos (mantener 30 seg cada uno)</li>
                                    <li>Hidratación abundante</li>
                                </ul>
                                
                                <p class="nota-importante">
                                    <strong>NOTA:</strong> La recuperación es fundamental para el crecimiento muscular. Asegúrate de consumir PROTEÍNA GORILLA para mantener un balance proteico positivo durante todo el día.
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                break;
            case 4:
                contenido = `
                    <div class="rutina-detalle-activa">
                        <h3>DÍA 4: PIERNAS Y GLÚTEOS</h3>
                        <div class="rutina-detalle">
                            <div class="rutina-img">
                                <img src="img/Reto/Aumentar/g5.png" alt="Rutina Piernas y Glúteos">
                            </div>
                            <div class="rutina-pasos">
                                <h4>CALENTAMIENTO (10 min)</h4>
                                <ul>
                                    <li>Movilidad de cadera, rodillas y tobillos</li>
                                    <li>Sentadillas sin peso (20 rep)</li>
                                    <li>Puentes de glúteo (15 rep)</li>
                                    <li>Zancadas alternadas (10 por pierna)</li>
                                </ul>
                                
                                <h4>ENTRENAMIENTO PRINCIPAL</h4>
                                <ul>
                                    <li>Sentadillas con barra (5 series x 8-10 rep)</li>
                                    <li>Peso muerto (4 series x 8-10 rep)</li>
                                    <li>Prensa de piernas (4 series x 10-12 rep)</li>
                                    <li>Extensiones de cuádriceps (3 series x 12-15 rep)</li>
                                    <li>Curl femoral (3 series x 12-15 rep)</li>
                                    <li>Hip thrust (4 series x 12-15 rep)</li>
                                    <li>Elevaciones de pantorrilla de pie (4 series x 15-20 rep)</li>
                                    <li>Elevaciones de pantorrilla sentado (3 series x 15-20 rep)</li>
                                </ul>
                                
                                <h4>FINALIZADOR</h4>
                                <ul>
                                    <li>Superserie: Sentadillas búlgaras + Zancadas caminando (2 rondas, 10 rep por pierna)</li>
                                </ul>
                                
                                <h4>ENFRIAMIENTO (5 min)</h4>
                                <ul>
                                    <li>Estiramientos específicos de piernas</li>
                                </ul>
                                
                                <p class="nota-importante">
                                    <strong>NOTA:</strong> Toma PRE-ENTRENO GORILLA 30 minutos antes y BCAA GORILLA durante el entrenamiento. Consume PROTEÍNA GORILLA inmediatamente después para maximizar la recuperación.
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                break;
            case 5:
                contenido = `
                    <div class="rutina-detalle-activa">
                        <h3>DÍA 5: HOMBROS Y ABDOMEN</h3>
                        <div class="rutina-detalle">
                            <div class="rutina-img">
                                <img src="img/Reto/Aumentar/g13.png" alt="Rutina Hombros y Abdomen">
                            </div>
                            <div class="rutina-pasos">
                                <h4>CALENTAMIENTO (8 min)</h4>
                                <ul>
                                    <li>Movilidad de hombros y columna</li>
                                    <li>Rotaciones de brazos (20 rep)</li>
                                    <li>Elevaciones laterales ligeras (15 rep)</li>
                                    <li>Plancha frontal (30 seg)</li>
                                </ul>
                                
                                <h4>ENTRENAMIENTO DE HOMBROS</h4>
                                <ul>
                                    <li>Press militar con barra o mancuernas (4 series x 8-10 rep)</li>
                                    <li>Elevaciones laterales (4 series x 12-15 rep)</li>
                                    <li>Elevaciones frontales (3 series x 12-15 rep)</li>
                                    <li>Remo al mentón (3 series x 10-12 rep)</li>
                                    <li>Face pulls (3 series x 15 rep)</li>
                                    <li>Encogimientos de hombros (4 series x 12-15 rep)</li>
                                </ul>
                                
                                <h4>ENTRENAMIENTO DE ABDOMEN</h4>
                                <ul>
                                    <li>Crunch en máquina o con peso (4 series x 15-20 rep)</li>
                                    <li>Russian twists con peso (3 series x 20 rep)</li>
                                    <li>Elevaciones de piernas colgado (3 series x 12-15 rep)</li>
                                    <li>Plancha con rotación (3 series x 10 rep por lado)</li>
                                    <li>Ab wheel rollout (3 series x 10-12 rep)</li>
                                </ul>
                                
                                <h4>ENFRIAMIENTO (5 min)</h4>
                                <ul>
                                    <li>Estiramientos específicos de hombros y core</li>
                                </ul>
                                
                                <p class="nota-importante">
                                    <strong>NOTA:</strong> Toma PRE-ENTRENO GORILLA 30 minutos antes y PROTEÍNA GORILLA inmediatamente después para maximizar el desarrollo muscular.
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                break;
            case 6:
                contenido = `
                    <div class="rutina-detalle-activa">
                        <h3>DÍA 6: ENTRENAMIENTO COMPUESTO</h3>
                        <div class="rutina-detalle">
                            <div class="rutina-img">
                                <img src="img/Reto/Aumentar/g14.png" alt="Entrenamiento Compuesto">
                            </div>
                            <div class="rutina-pasos">
                                <h4>CALENTAMIENTO (10 min)</h4>
                                <ul>
                                    <li>Movilidad articular completa</li>
                                    <li>Saltos a la comba (2 min)</li>
                                    <li>Sentadillas sin peso (15 rep)</li>
                                    <li>Push-ups (10 rep)</li>
                                    <li>Superman (10 rep)</li>
                                </ul>
                                
                                <h4>ENTRENAMIENTO PRINCIPAL (Circuito de 4 rondas)</h4>
                                <ul>
                                    <li>Clean and press (10 rep)</li>
                                    <li>Pull-ups o dominadas (máximas posibles)</li>
                                    <li>Front squats (12 rep)</li>
                                    <li>Remo con barra (12 rep)</li>
                                    <li>Burpees (10 rep)</li>
                                    <li>Descanso 2 minutos entre rondas</li>
                                </ul>
                                
                                <h4>ENTRENAMIENTO COMPLEMENTARIO</h4>
                                <ul>
                                    <li>Farmer's walk (3 series de 30 metros)</li>
                                    <li>Battle ropes (3 series de 30 segundos)</li>
                                    <li>Planchas laterales con rotación (3 series de 10 rep por lado)</li>
                                </ul>
                                
                                <h4>ENFRIAMIENTO (5 min)</h4>
                                <ul>
                                    <li>Estiramientos generales</li>
                                    <li>Respiración profunda</li>
                                </ul>
                                
                                <p class="nota-importante">
                                    <strong>NOTA:</strong> Toma PRE-ENTRENO GORILLA 30 minutos antes, BCAA GORILLA durante el entrenamiento y PROTEÍNA GORILLA inmediatamente después para maximizar el rendimiento y la recuperación.
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                break;
            case 7:
                contenido = `
                    <div class="rutina-detalle-activa">
                        <h3>DÍA 7: DESCANSO TOTAL</h3>
                        <div class="rutina-detalle">
                            <div class="rutina-img">
                                <img src="img/Reto/Aumentar/g18.png" alt="Día de Descanso">
                            </div>
                            <div class="rutina-pasos">
                                <h4>DESCANSO COMPLETO</h4>
                                <p>Hoy es tu día de descanso completo. Tu cuerpo necesita tiempo para recuperarse y crecer. Aprovecha este día para:</p>
                                <ul>
                                    <li>Descansar adecuadamente</li>
                                    <li>Asegurar una buena hidratación</li>
                                    <li>Mantener una alimentación rica en proteínas y nutrientes</li>
                                    <li>Preparar mentalmente la semana siguiente</li>
                                </ul>
                                
                                <h4>RECOMENDACIONES</h4>
                                <ul>
                                    <li>Duerme al menos 8 horas</li>
                                    <li>Practica técnicas de relajación o meditación</li>
                                    <li>Evita el alcohol y comidas procesadas</li>
                                    <li>Mantén una ingesta calórica adecuada para tu objetivo</li>
                                </ul>
                                
                                <p class="nota-importante">
                                    <strong>NOTA:</strong> Aunque es un día de descanso, mantén tu ingesta de PROTEÍNA GORILLA distribuida a lo largo del día para asegurar un balance proteico positivo constante.
                                </p>
                            </div>
                        </div>
                    </div>
                `;
                break;
            default:
                contenido = '<h3>Selecciona un día para ver el detalle de la rutina</h3>';
        }
    }
    
    detalleElement.innerHTML = contenido;
}

// Funciones para productos y planes
function verProducto(producto) {
    alert(`Próximamente: Detalles completos del producto ${producto.toUpperCase()} GORILLA`);
}

function descargarPlan(tipo) {
    alert(`Próximamente: Descarga del plan nutricional completo para ${tipo === 'bajar' ? 'PÉRDIDA DE PESO' : 'GANANCIA MUSCULAR'}`);
}

function abrirChat() {
    alert('Próximamente: Chat en vivo con nuestros expertos en nutrición y entrenamiento');
}

// Funciones para la galería de imágenes
function ampliarImagen(img) {
    const modal = document.getElementById('modal-imagen');
    const imagenAmpliada = document.getElementById('imagen-ampliada');
    
    // Establecer la imagen ampliada
    imagenAmpliada.src = img.src;
    imagenAmpliada.alt = img.alt;
    
    // Mostrar el modal
    modal.style.display = 'block';
    
    // Deshabilitar el scroll del body
    document.body.style.overflow = 'hidden';
}

function cerrarModal() {
    const modal = document.getElementById('modal-imagen');
    
    // Ocultar el modal
    modal.style.display = 'none';
    
    // Habilitar el scroll del body
    document.body.style.overflow = 'auto';
}

// Cerrar el modal al hacer clic fuera de la imagen
window.onclick = function(event) {
    const modal = document.getElementById('modal-imagen');
    if (event.target == modal) {
        cerrarModal();
    }
}

// Cerrar el modal con la tecla ESC
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        cerrarModal();
    }
});