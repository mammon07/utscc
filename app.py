from flask import Flask, render_template
import pymysql

app = Flask(__name__)

# Koneksi ke database RDS
db = pymysql.connect(
    host='databaseuts.cfmioyeiwt5e.ap-southeast-1.rds.amazonaws.com',
    user='admin',
    password='KidzKidz123#',
    database=''
)

# URL Bucket S3
S3_BUCKET_URL = "https://bucketutsija.s3.ap-southeast-1.amazonaws.com/"

@app.route('/')
def index():
    cursor = db.cursor()
    cursor.execute("SELECT nama_produk, harga, gambar FROM produk")
    products = cursor.fetchall()
    cursor.close()

    product_list = []
    for nama, harga, gambar in products:
        product_list.append({
            "nama": nama,
            "harga": harga,
            "gambar_url": S3_BUCKET_URL + gambar  # otomatis link ke S3
        })

    return render_template('index.html', products=product_list)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=80)
