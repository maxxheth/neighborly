FROM node:20-alpine

WORKDIR /app

# Install dependencies first for better caching
COPY bedrock/web/app/themes/sage/package*.json ./

RUN npm ci

# Copy theme source
COPY bedrock/web/app/themes/sage .

EXPOSE 5173

CMD ["npm", "run", "dev", "--", "--host", "0.0.0.0"]
