<div id="rp-chatbot">
    <button id="rp-chat-toggle" aria-label="Abrir asistente">
        <span>✦</span>
    </button>

    <section id="rp-chat-window" class="rp-chat-hidden">
        <header class="rp-chat-header">
            <div>
                <strong>Asistente Premium</strong>
                <small>● En línea · Restaurant Premium</small>
            </div>
            <button id="rp-chat-close" type="button">×</button>
        </header>

        <div id="rp-chat-messages">
            <div class="rp-chat-message rp-chat-bot">
                ¡Hola! Bienvenido a Restaurant Premium. ✨
                <br><br>
                Soy tu asistente virtual. ¿En qué puedo ayudarte?
            </div>
        </div>

        <div class="rp-chat-suggestions">
            <button type="button" data-go="/menu">🍽️ Abrir menú</button>
            <button type="button" data-go="/reservaciones">🪑 Reservar mesa</button>
        </div>

        <form id="rp-chat-form">
            <input
                id="rp-chat-input"
                type="text"
                placeholder="Escribe tu mensaje..."
                autocomplete="off"
                required
            >
            <button type="submit">➤</button>
        </form>
    </section>
</div>

<style>
#rp-chatbot {
    font-family: Arial, sans-serif;
    position: fixed;
    right: 25px;
    bottom: 25px;
    z-index: 99999;
}

#rp-chat-toggle {
    width: 62px;
    height: 62px;
    border-radius: 50%;
    border: 2px solid #f2d18a;
    background: linear-gradient(135deg, #c99a42, #f5d68d);
    color: #17130c;
    font-size: 30px;
    cursor: pointer;
    box-shadow: 0 8px 30px #0008;
    transition: transform .25s;
}

#rp-chat-toggle:hover {
    transform: scale(1.08);
}

#rp-chat-window {
    width: 350px;
    height: 480px;
    max-height: 75vh;
    background: #171614;
    border: 1px solid #806333;
    border-radius: 18px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    box-shadow: 0 15px 50px #0009;
    margin-bottom: 15px;
}

.rp-chat-hidden {
    display: none !important;
}

.rp-chat-header {
    background: linear-gradient(135deg, #292319, #171614);
    color: #f3d18a;
    padding: 18px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #5b4728;
}

.rp-chat-header strong {
    display: block;
    font-size: 15px;
}

.rp-chat-header small {
    display: block;
    color: #b9a989;
    font-size: 10px;
    margin-top: 7px;
}

#rp-chat-close {
    background: transparent;
    border: none;
    color: #f3d18a;
    font-size: 25px;
    cursor: pointer;
}

#rp-chat-messages {
    flex: 1;
    padding: 16px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.rp-chat-message {
    padding: 12px 14px;
    border-radius: 14px;
    font-size: 13px;
    line-height: 1.6;
    max-width: 85%;
    overflow-wrap: anywhere;
}

.rp-chat-bot {
    background: #29251e;
    color: #eee2c9;
    border: 1px solid #51432d;
    align-self: flex-start;
}

.rp-chat-user {
    background: linear-gradient(135deg, #b98a37, #e8c779);
    color: #17130c;
    align-self: flex-end;
}

.rp-chat-suggestions {
    display: flex;
    gap: 7px;
    padding: 0 12px 12px;
    flex-wrap: wrap;
}

.rp-chat-suggestions button {
    background: transparent;
    border: 1px solid #9a783c;
    color: #e6c579;
    border-radius: 20px;
    padding: 8px 10px;
    font-size: 11px;
    cursor: pointer;
}

#rp-chat-form {
    display: flex;
    padding: 12px;
    border-top: 1px solid #403629;
    gap: 8px;
}

#rp-chat-input {
    min-width: 0;
    flex: 1;
    background: #24221e;
    border: 1px solid #51432d;
    border-radius: 10px;
    padding: 12px;
    color: white;
    outline: none;
}

#rp-chat-input:focus {
    border-color: #d5ad5d;
}

#rp-chat-form button {
    width: 42px;
    border: none;
    border-radius: 10px;
    background: #d5ad5d;
    color: #17130c;
    font-size: 20px;
    cursor: pointer;
}

@media (max-width: 450px) {
    #rp-chatbot {
        right: 15px;
        bottom: 15px;
    }

    #rp-chat-window {
        width: calc(100vw - 30px);
        height: 70vh;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('rp-chat-toggle');
    const close = document.getElementById('rp-chat-close');
    const windowChat = document.getElementById('rp-chat-window');
    const form = document.getElementById('rp-chat-form');
    const input = document.getElementById('rp-chat-input');
    const messages = document.getElementById('rp-chat-messages');

    if (!toggle || !windowChat || !form) return;

    toggle.addEventListener('click', function () {
        windowChat.classList.toggle('rp-chat-hidden');
    });

    close.addEventListener('click', function () {
        windowChat.classList.add('rp-chat-hidden');
    });

    function addMessage(text, type) {
        const message = document.createElement('div');
        message.className = 'rp-chat-message rp-chat-' + type;
        message.textContent = text;
        message.style.whiteSpace = 'pre-line';
        messages.appendChild(message);
        messages.scrollTop = messages.scrollHeight;
    }

    function respond(text) {
        const message = text.toLowerCase().trim();

        // Saludos específicos antes del saludo general.
        if (message.includes('buenos días')) {
            return '¡Muy buenos días! ☀️ Esperamos que tu día esté lleno de cosas bonitas. ¿En qué podemos ayudarte hoy?';
        }

        if (message.includes('buenas tardes')) {
            return '¡Muy buenas tardes! ✨ Bienvenido a Restaurant Premium. ¿Te gustaría conocer nuestro menú o reservar una mesa?';
        }

        if (message.includes('buenas noches')) {
            return '¡Muy buenas noches! 🌙 Será un gusto atenderte. ¿Deseas consultar nuestro menú o preparar una reservación?';
        }

        if (message.match(/\b(hola|holaa|holaaa|buenas|hey|hi|hello)\b/)) {
            return '¡Hola! 😊 Bienvenido a Restaurant Premium. Es un placer recibirte. ¿Cómo estás hoy? ¿Vienes buscando algo delicioso o quieres organizar una visita especial?';
        }

        // Bienvenida y presentación
        if (message.includes('quién eres') || message.includes('quien eres')) {
            return 'Soy el asistente virtual de Restaurant Premium. Estoy aquí para ayudarte a conocer nuestro restaurante, consultar el menú y orientarte para reservar una mesa. 😊';
        }

        if (message.includes('cómo estás') || message.includes('como estas')) {
            return '¡Estoy muy bien, gracias por preguntar! 💛 Y mejor todavía porque puedo ayudarte. ¿Qué te gustaría hacer hoy?';
        }

        if (message.includes('qué haces') || message.includes('que haces')) {
            return 'Estoy aquí para ayudarte a disfrutar tu experiencia en Restaurant Premium. Puedo orientarte con el menú, las reservaciones y nuestros ambientes.';
        }

        // Menú
        if (message.includes('menú') || message.includes('menu')) {
            return '¡Nuestro menú te espera! 🍽️ Entra a la sección Menú para descubrir los platos que tenemos disponibles. ¿Te gustaría explorar algo especial?';
        }

        if (message.includes('platos') || message.includes('platillo')) {
            return '¡Tenemos opciones para disfrutar! Puedes revisar todos los platos disponibles en nuestro menú. ¿Buscas algo para almorzar, cenar o compartir?';
        }

        if (message.includes('comida') || message.includes('comer')) {
            return '¡Qué rico plan! 😋 Puedes visitar nuestro menú y elegir lo que más te guste. ¿Vienes solo, con amigos o en familia?';
        }

        if (message.includes('desayuno')) {
            return '¡Un buen desayuno siempre alegra el día! Consulta nuestro menú para conocer las opciones disponibles actualmente.';
        }

        if (message.includes('almuerzo')) {
            return '¡Hora de disfrutar un buen almuerzo! 🍽️ Puedes revisar nuestro menú y elegir tu plato favorito.';
        }

        if (message.includes('cena') || message.includes('cenar')) {
            return '¡Una cena especial suena genial! ✨ Puedes reservar una mesa y disfrutar una experiencia agradable en nuestro restaurante.';
        }

        if (message.includes('postre') || message.includes('dulce')) {
            return '¡Siempre hay espacio para algo dulce! 🍰 Revisa nuestro menú para descubrir si tenemos opciones de postres disponibles.';
        }

        if (message.includes('bebida') || message.includes('tomar')) {
            return '¡Claro! 🥤 Puedes consultar las bebidas disponibles en nuestro menú. ¿Buscas algo refrescante para acompañar tu comida?';
        }

        // Precios
        if (message.includes('precio') || message.includes('cuánto cuesta') ||
            message.includes('cuanto cuesta') || message.includes('cuánto vale') ||
            message.includes('cuanto vale')) {
            return '¡Con gusto! 😊 Puedes consultar los precios actualizados directamente en nuestro menú. Así tendrás la información correcta antes de elegir.';
        }

        if (message.includes('barato') || message.includes('económico') ||
            message.includes('economico')) {
            return '¡Entiendo! Puedes revisar nuestro menú y comparar las opciones según tu presupuesto. Queremos que disfrutes una buena experiencia.';
        }

        if (message.includes('caro') || message.includes('costoso')) {
            return 'Los precios de cada plato están indicados en nuestro menú para que puedas elegir con tranquilidad. 💛';
        }

        // Recomendaciones
        if (message.includes('recomienda') || message.includes('recomendación') ||
            message.includes('recomendacion')) {
            return '¡Me encanta ayudarte a elegir! 😋 Cuéntame, ¿prefieres algo para compartir, un plato individual o una comida especial? También puedes explorar nuestro menú.';
        }

        if (message.includes('qué me sugieres') || message.includes('que me sugieres')) {
            return 'Te sugiero elegir algo que te apetezca mucho hoy. 😊 Puedes revisar nuestro menú y descubrir las opciones disponibles. ¿Quieres algo ligero o una comida completa?';
        }

        if (message.includes('tienes hambre') || message.includes('tengo hambre')) {
            return '¡Entonces es momento de disfrutar algo rico! 🍽️ Visita nuestro menú y encuentra tu próximo plato favorito.';
        }

        // Reservaciones específicas antes de la respuesta general.
        if (message.includes('reservar para dos') || message.includes('para dos personas')) {
            return '¡Una visita para dos suena perfecta! 💛 En el mapa de reservaciones puedes elegir una mesa con capacidad para 2 personas.';
        }

        if (message.includes('reservar para cuatro') || message.includes('para cuatro personas')) {
            return '¡Perfecto para compartir! Puedes seleccionar una mesa con capacidad para 4 personas desde nuestro mapa de reservaciones.';
        }

        if (message.includes('somos varios') || message.includes('grupo grande')) {
            return '¡Nos encantan las reuniones! Puedes revisar las mesas disponibles para grupos en el mapa de reservaciones y elegir una con capacidad suficiente.';
        }

        if (message.includes('cancelar reserva') || message.includes('cancelar reservación')) {
            return 'Si necesitas cancelar o modificar una reservación, comunícate directamente con el restaurante para que puedan ayudarte con tu solicitud.';
        }

        if (message.includes('confirmar reserva') || message.includes('confirmar reservación')) {
            return 'Después de guardar tu reservación, puedes usar el enlace de WhatsApp que aparece en pantalla para enviar tu solicitud de confirmación.';
        }

        if (message.includes('reserv') || message.includes('mesa')) {
            return '¡Será un placer ayudarte con tu reservación! 🪑 Entra a la sección Reservaciones, elige tu ambiente, fecha, hora y cantidad de personas. Luego podrás seleccionar una mesa disponible.';
        }

        // Ambientes específicos antes de la respuesta general.
        if (message.includes('terraza')) {
            return '¡La terraza es una linda opción para disfrutar al aire libre! 🌿 Puedes seleccionarla en la sección de reservaciones y ver las mesas disponibles.';
        }

        if (message.includes('privado') || message.includes('privacidad')) {
            return 'El salón privado es una excelente opción si buscas mayor privacidad y comodidad. Puedes revisar su disponibilidad desde el mapa de reservaciones.';
        }

        if (message.includes('interior') || message.includes('salón')) {
            return 'El salón interior ofrece un espacio elegante y acogedor. Puedes elegirlo al momento de reservar tu mesa.';
        }

        if (message.includes('ambiente') || message.includes('espacio')) {
            return 'Tenemos diferentes ambientes para disfrutar tu visita: 🏛️ salón interior, 🌿 terraza y ✨ salón privado. Puedes elegir el que más te guste al reservar.';
        }

        // Ocasiones especiales
        if (message.includes('cumpleaños') || message.includes('cumpleanos')) {
            return '¡Qué lindo celebrar un cumpleaños! 🎂 Puedes reservar una mesa para compartir ese momento especial. Si tienes alguna solicitud, escríbela en el campo de solicitudes especiales.';
        }

        if (message.includes('aniversario')) {
            return '¡Felicidades por esa ocasión especial! 💕 Una reservación puede ayudarte a organizar una visita agradable para celebrar tu aniversario.';
        }

        if (message.includes('pareja') || message.includes('romántico') ||
            message.includes('romantico')) {
            return '¡Una cena en pareja suena maravillosa! ✨ Puedes elegir el ambiente que más te guste y reservar una mesa para dos personas.';
        }

        if (message.includes('familia') || message.includes('niños') ||
            message.includes('ninos')) {
            return '¡Una salida en familia siempre es especial! 💛 En nuestro mapa puedes elegir una mesa con capacidad adecuada para todos.';
        }

        if (message.includes('amigos') || message.includes('amistad')) {
            return '¡Una buena comida con amigos es un gran plan! Puedes revisar las mesas disponibles y reservar para tu grupo.';
        }

        // Ubicación y horarios
        if (message.includes('ubicación') || message.includes('ubicacion') ||
            message.includes('dirección') || message.includes('direccion') ||
            message.includes('dónde están') || message.includes('donde estan')) {
            return 'Puedes consultar la ubicación y los datos de contacto del restaurante en la sección Contacto de nuestra página. 📍';
        }

        if (message.includes('horario') || message.includes('abren') ||
            message.includes('cierran') || message.includes('abierto')) {
            return 'Puedes consultar nuestros horarios de atención en la sección Contacto. Así tendrás la información actualizada antes de visitarnos.';
        }

        if (message.includes('estacionamiento') || message.includes('parqueo')) {
            return 'Para consultar información sobre estacionamiento o parqueo, te recomendamos revisar la sección Contacto o comunicarte directamente con el restaurante.';
        }

        // Servicio y atención
        if (message.includes('atención') || message.includes('atencion') ||
            message.includes('servicio')) {
            return 'En Restaurant Premium queremos que disfrutes una experiencia agradable. 💛 Si necesitas ayuda, puedes comunicarte con nuestro equipo desde la sección Contacto.';
        }

        if (message.includes('quejas') || message.includes('reclamo') ||
            message.includes('problema')) {
            return 'Lamentamos que hayas tenido una dificultad. Queremos ayudarte. Por favor, comunícate con el restaurante desde la sección Contacto para que nuestro equipo pueda atenderte.';
        }

        if (message.includes('pedido') || message.includes('pedir')) {
            return 'Puedes explorar nuestro menú para conocer los platos disponibles. Si deseas realizar un pedido, revisa las opciones que ofrece actualmente nuestro restaurante.';
        }

        // Agradecimientos
        if (message.includes('gracias') || message.includes('agradezco')) {
            return '¡De nada! 💛 Estamos aquí para ayudarte. ¿Te gustaría consultar algo más sobre Restaurant Premium?';
        }

        if (message.includes('muy amable') || message.includes('amable')) {
            return '¡Muchas gracias por tus palabras! 😊 Será un placer ayudarte cuando lo necesites.';
        }

        // Despedidas
        if (message.includes('adiós') || message.includes('adios') ||
            message.includes('hasta luego') || message.includes('chao')) {
            return '¡Gracias por conversar conmigo! ✨ Esperamos recibirte pronto en Restaurant Premium. ¡Que tengas un excelente día!';
        }

        // Ayuda
        if (message.includes('ayuda') || message.includes('qué puedes hacer') ||
            message.includes('que puedes hacer')) {
            return '¡Claro! 😊 Puedo orientarte sobre:\n\n🍽️ Nuestro menú\n💰 Información de precios\n🪑 Reservaciones y mesas\n🌿 Ambientes del restaurante\n🎂 Celebraciones especiales\n📍 Contacto y ubicación\n\n¿Qué te gustaría conocer?';
        }

        return '¡Gracias por escribir a Restaurant Premium! 😊 Estoy aquí para ayudarte. Puedes preguntarme sobre nuestro menú, reservaciones, ambientes o información del restaurante. ¿Qué te gustaría saber?';
    }

    function sendMessage(text) {
        if (!text.trim()) return;

        addMessage(text, 'user');

        setTimeout(function () {
            addMessage(respond(text), 'bot');
        }, 350);
    }

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        sendMessage(input.value);
        input.value = '';
    });

    document.querySelectorAll('#rp-chatbot [data-message]').forEach(function (button) {
        button.addEventListener('click', function () {
            sendMessage(button.dataset.message);
        });
    });

    document.querySelectorAll('#rp-chatbot [data-go]').forEach(function (button) {
        button.addEventListener('click', function () {
            window.location.href = button.dataset.go;
        });
    });
});
</script>
