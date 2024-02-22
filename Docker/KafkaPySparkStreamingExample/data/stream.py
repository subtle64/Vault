from pyspark.sql import SparkSession
from pyspark.sql.functions import monotonically_increasing_id 
import os
import time

KAFKA_BOOTSTRAP_SERVERS = "kafka:9092"
KAFKA_TOPIC = "transaction_data"
FILE_PATH = "/data/transactions.csv"

spark = SparkSession.builder.appName("write_transactions").getOrCreate()
spark.sparkContext.setLogLevel("WARN") 
df_transactions_stream = spark.read\
        .option("header", "true")\
        .option("inferSchema", "true")\
        .csv(FILE_PATH)

df_transactions_stream.printSchema()

df_transactions = df_transactions_stream.withColumn("id", monotonically_increasing_id())
for i, row in enumerate(df_transactions.collect()):
    df_row = spark.createDataFrame([row.asDict()])
    df_row = df_row.unpivot(ids=['id'], values = None, variableColumnName="key", valueColumnName="value")
    df_row = df_row.withColumn("value", df_row['value'].cast('string'))
    df_row.show()
    df_row.write\
        .format("kafka")\
        .option("kafka.bootstrap.servers", KAFKA_BOOTSTRAP_SERVERS)\
        .option("topic", KAFKA_TOPIC)\
        .save()

    print(f"Streaming data to {KAFKA_BOOTSTRAP_SERVERS} {KAFKA_TOPIC}")
    print(f"Progress: {i}/{len(df_transactions.collect())}")
    time.sleep(2.5)