# Dockerfile
FROM node:18

# Directorio
WORKDIR /var/www/html

# Copiar archivos de proyecto
COPY ws-server/package*.json ./
COPY ws-server/server.js ./

# Instalar dependencias
RUN npm install

# Exponer el puerto en el que WebSocket corre
EXPOSE 8080

# Iniciar la aplicación
CMD ["node", "server.js"]
