from chatbot import Chatbot  # importing the chatbot class
from flask import Flask, render_template, request

app = Flask(__name__)  # creating the flask app object
# creating the chatbot object to work on later
chatbot = Chatbot(api_key="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")


@app.route("/")  # defining the route for the home page (SPARSH work on this later)
def index():
    return render_template("index.html")  # rendering the index.html template
