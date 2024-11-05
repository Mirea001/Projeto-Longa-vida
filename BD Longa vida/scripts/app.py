from flask import Flask, render_template, request, redirect, url_for
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://usuario:senha@localhost/meubanco'
db = SQLAlchemy(app)

# ... (resto do código do modelo Plano)

@app.route('/')
def listar_planos():
    planos = Plano.query.all()
    return render_template('listar_planos.html', planos=planos)

@app.route('/cadastrar', methods=['GET', 'POST'])
def cadastrar_plano():
    # ... (código de cadastro já existente)

@app.route('/editar/<int:id>', methods=['GET', 'POST'])
def editar_plano(id):
    plano = Plano.query.get_or_404(id)
    if request.method == 'POST':
        plano.descricao = request.form['descricao']
        plano.valor = request.form['valor']
        db.session.commit()
        return redirect(url_for('listar_planos'))
    return render_template('editar_plano.html', plano=plano)

@app.route('/excluir/<int:id>')
def excluir_plano(id):
    plano = Plano.query.get_or_404(id)
    db.session.delete(plano)
    db.session.commit()
    return redirect(url_for('listar_planos'))

# ... (resto das rotas)

if __name__ == '__main__':
    db.create_all()
    app.run(debug=True)