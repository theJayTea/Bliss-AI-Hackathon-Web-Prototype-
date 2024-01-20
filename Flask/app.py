from flask import Flask, render_template, request

from chatbot import Chatbot  # importing the chatbot class

app = Flask(__name__)  # creating the flask app object
# creating the chatbot object to work on later
chatbot = Chatbot(api_key="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")


@app.route("/")  # defining the route for the home page (SPARSH work on this later)
def index():
    return render_template("index.html")  # rendering the index.html template


# we'll call the a backend using this to get the llm's response
@app.route("/get_response", methods=["POST"])
def get_response():
    # to get the user prompt from the web form
    user_prompt = request.form.get("user_prompt")
    # ...image file...
    image_file = request.files.get("image_path")
    # since image will be optional if we implement it checking if it's None (and if it has a valid filename)
    if image_file and image_file.filename:
        # save the image file to a temporary location
        image_file.save("temp.jpg")
        # pass the temporary file name to a chatbot.get_response function
        assistant_message = chatbot.get_response(user_prompt, "temp.jpg")
    else:
        # pass None as the image path to the chatbot.get_response function
        assistant_message = chatbot.get_response(user_prompt, None)
    # return the chatbot response
    return assistant_message


if __name__ == "__main__":
    app.run(debug=True)  # run the app in debug mode
