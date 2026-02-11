#!/bin/bash
FECHA=$(date +%Y-%m-%d_%H-%M)
DESTINO="/home/ubuntu/backups"
NOMBRE_SQL="retronexus_db_$FECHA.sql"
echo "Iniciando copia de seguridad de la base de datos"
docker exec db mysqldump -u retronexus_user -psuperpassword retronexus_db > $DESTINO/$NOMBRE_SQL
echo "Copia finalizada con éxito en $DESTINO/$NOMBRE_SQL"