FROM node:lts-alpine

# install simple http server for serving static content
RUN npm install -g http-server


WORKDIR /app

COPY package*.json ./

COPY . .

EXPOSE 8080

# CMD [ "tail", "-f", "/dev/null" ]
RUN npm install

CMD [ "npm",  "run",  "dev" ]