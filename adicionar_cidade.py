import sqlite3
from flask import Flask, request

app = Flask(__name__)

@app.route('/adicionar_cidade', methods=['POST'])
def adicionar_cidade():
    if request.method == 'POST':
        nome = request.form['nome']
        temperatura = request.form['temperatura']
        clima = request.form['clima']

        # Conectar ao banco de dados SQLite
        conn = sqlite3.connect('cidades.db')
        cursor = conn.cursor()

        # Inserir a cidade na tabela
        cursor.execute("INSERT INTO cidades (nome, temperatura, clima) VALUES (?, ?, ?)", (nome, temperatura, clima))
        conn.commit()
        conn.close()

        return 'Cidade adicionada com sucesso!'

if __name__ == '__main__':
    app.run(debug=True)
