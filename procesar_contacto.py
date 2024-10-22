from flask import Flask, render_template, request, redirect, url_for, flash
import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

app = Flask(__name__)
app.secret_key = 'supersecretkey'  # Necesario para usar flash messages

@app.route('/contacto', methods=['GET', 'POST'])
def contacto():
    if request.method == 'POST':
        # Recoger y sanitizar los datos del formulario
        nombre = request.form.get('nombre')
        email = request.form.get('email')
        mensaje = request.form.get('mensaje')
        
        if not nombre or not email or not mensaje:
            flash('Todos los campos son obligatorios')
            return redirect(url_for('contacto'))
        
        # Configurar el correo
        destinatario = "sseebbaassttiiaann838@gmail.com"
        asunto = "Nuevo mensaje de contacto desde el sitio web"
        
        contenido = f"Nombre: {nombre}\nEmail: {email}\nMensaje: {mensaje}"
        
        # Enviar el correo
        try:
            msg = MIMEMultipart()
            msg['From'] = email
            msg['To'] = destinatario
            msg['Subject'] = asunto
            
            msg.attach(MIMEText(contenido, 'plain'))
            
            # Configura el servidor de correo (ejemplo usando Gmail)
            server = smtplib.SMTP('smtp.gmail.com', 587)
            server.starttls()
            server.login('sseebbaassttiiaann838@gmail.com', 'tupassword')  # Cambia por tus credenciales
            text = msg.as_string()
            server.sendmail(email, destinatario, text)
            server.quit()
            
            return redirect(url_for('confirmacion.html'))
        except Exception as e:
            flash(f"Error al enviar el mensaje: {str(e)}")
            return redirect(url_for('contacto.html'))
    
    return render_template('contacto.html')

@app.route('confirmacion.html')
def confirmacion():
    return render_template('confirmacion.html')

if __name__ == '__main__':
    app.run(debug=True)
