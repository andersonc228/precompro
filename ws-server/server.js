import WebSocket from 'ws';
import mongoose from 'mongoose';
import express from 'express'; // Importar express

// Configurar servidor express
const app = express();
app.use(express.json()); // Middleware para parsear JSON

// Conectar a MongoDB Atlas
await mongoose.connect('mongodb+srv://anderson:anderson28@cluster0.avitl.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0', {
    useNewUrlParser: true,
    useUnifiedTopology: true
});

const pedidoSchema = new mongoose.Schema({
    cuenta: Object,
    pedido: Object,
});

const Pedido = mongoose.model('Pedido', pedidoSchema);

// Crear el servidor HTTP
const server = app.listen(8080, () => {
    console.log('Servidor HTTP y WebSocket corriendo en el puerto 8080');
});

// Crear el servidor WebSocket asociado al servidor HTTP
const wss = new WebSocket.Server({ server });

// Manejar conexiones WebSocket
wss.on('connection', ws => {
    ws.on('message', async message => {
        console.log('Mensaje recibido:', message);

        try {
            const data = JSON.parse(message);

            // Almacenar en MongoDB
            const nuevoPedido = new Pedido({
                cuenta: data.cuenta,
                pedido: data.pedido,
            });
            await nuevoPedido.save();
            console.log('Pedido guardado en MongoDB', nuevoPedido);
        } catch (error) {
            console.error('Error al procesar el mensaje:', error);
        }
    });

    ws.send('Conexión hecha');
});

// Endpoint para recibir datos desde Laravel
app.post('/send-pedido', async (req, res) => {
    const { cuenta, pedido } = req.body;

    // Enviar datos a todos los clientes WebSocket conectados
    wss.clients.forEach(client => {
        if (client.readyState === WebSocket.OPEN) {
            client.send(JSON.stringify({ cuenta, pedido }));
        }
    });

    // Almacenar en MongoDB
    try {
        const nuevoPedido = new Pedido({
            cuenta,
            pedido,
        });
        await nuevoPedido.save();
        console.log('Pedido guardado en MongoDB desde Laravel', nuevoPedido);
        res.status(200).json({ message: 'Pedido enviado a WebSocket y guardado en MongoDB' });
    } catch (error) {
        console.error('Error al guardar el pedido:', error);
        res.status(500).json({ error: 'Error al guardar el pedido en MongoDB' });
    }
});
