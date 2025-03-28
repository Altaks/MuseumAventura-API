import os
from fastapi import FastAPI, Response
import requests
from botocore.awsrequest import AWSRequest
from botocore.auth import SigV4Auth
from botocore.credentials import Credentials

MINIO_ACCESS_KEY = os.getenv("MINIO_ACCESS_KEY")
MINIO_SECRET_KEY = os.getenv("MINIO_SECRET_KEY")
MINIO_ENDPOINT = os.getenv("MINIO_ENDPOINT")
AWS_REGION = os.getenv("AWS_REGION")
BUCKET_NAME = "x21"

app = FastAPI()

def sign_request(method, url):
    credentials = Credentials(MINIO_ACCESS_KEY, MINIO_SECRET_KEY)
    request = AWSRequest(method=method, url=url)
    
    request.prepare()
    SigV4Auth(credentials, "s3", AWS_REGION).add_auth(request)
    
    return request.headers

@app.get("/{object_key}")
async def get_object(object_key: str):
    url = f"{MINIO_ENDPOINT}/{BUCKET_NAME}/{object_key}"
    headers = sign_request("GET", url)
    
    response = requests.get(url, headers=headers)
    return Response(content=response.content, status_code=response.status_code, headers=dict(response.headers))