FROM python:3.10

WORKDIR /app

RUN pip install fastapi uvicorn requests botocore
COPY ../../kong/proxy.py /app/proxy.py
CMD ["uvicorn", "proxy:app", "--host", "proxy", "--port", "5000"]
