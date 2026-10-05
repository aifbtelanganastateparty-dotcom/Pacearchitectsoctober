FROM dunglas/frankenphp:1-php8.3-alpine

WORKDIR /app

# Copy the caddy configuration
COPY Caddyfile /etc/caddy/Caddyfile

# Copy the app files
COPY . /app

# Set port for Vercel
ENV PORT=8080
EXPOSE 8080

CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]
