import base64  # we'll need this if we wanna parse local images according to the vision docs, don't touch it

from openai import OpenAI


class Chatbot:
    def __init__(self, api_key):
        #!!!REMEMBER!!! to fine tune this with more personas maybe
        system_prompt = f"You are a helpful {subject} tutor named Bliss. Use the following principles in responding to students:\n    \n    - Keep in mind that the students may come from very poor financial and educational backgrounds, and if you're guiding them to external resources, reference only free resources.\n    - Use simple language as the students may not be especially literate.  Respond in the language the student used.\n    - Be concise and succinct.\n    - Pay careful attention to the student's underlying thought processes, understand their perspectives, and guide them from there.\n    - Guide students in their exploration of topics by briefly explaining any prerequisites, and encourage them to discover answers independently. Only provide direct answers at the end to enhance their reasoning and analytical skills.\n    - Promote critical thinking by encouraging students to question assumptions, evaluate evidence, and consider alternative viewpoints in order to arrive at well-reasoned conclusions.\n    - Demonstrate humility by acknowledging your own limitations and uncertainties, modeling a growth mindset and exemplifying the value of lifelong learning.\n\nFor context, the student you're going to converse with is named {student_name}. {student_name} is in grade {grade} in the {curriculum} curriculum, and is most fluent in {primary_language}."

        if tutors_notes != "none":
            system_prompt += f'\n\n\nAdditional notes about the student\'s behavior are:\n"{tutors_notes}".'

        if subject == "Science and Math":
            system_prompt += f"\n\n\nThey want to learn about or need help with Science and Math topics, so Bliss will act as a Science and Math tutor and keep the following in mind:\n1. Do not use LaTeX in the response. Use simple and legible typing conventions.\n2. Be concise with the response."
        if subject == "Languages":
            system_prompt += f"\n\n\nThey want to learn about or need help with languages, so Bliss will act as a language tutor and keep the following in mind:\n1. If the language that the student needs help with is not their primary language ({primary_language}), answer in a way that the novice student can understand.\n2. When working with literature, analyze and uncover the deeper meanings of the text for the student.\n3. If the student makes grammatical mistakes in the interactions, correct them constructively and kindly."
        # print(system_prompt)
        self.client = OpenAI(api_key=api_key)
        self.messages = [
            {"role": "system", "content": system_prompt},
            {
                "role": "assistant",
                "content": "Understood, I'm ready to assist the students following these guidelines.",
            },
        ]

    def encode_image(self, image_path):
        with open(image_path, "rb") as image_file:
            return base64.b64encode(image_file.read()).decode("utf-8")

    def get_response(self, user_prompt, image_path=None):
        user_message = {
            "role": "user",
            "content": [{"type": "text", "text": user_prompt}],
        }

        if image_path:
            base64_image = self.encode_image(image_path)
            user_message["content"].append(
                {
                    "type": "image_url",
                    "image_url": {
                        "url": f"data:image/jpeg;base64,{base64_image}",
                        "detail": "low",
                    },
                }
            )
        self.messages.append(user_message)

        response = self.client.chat.completions.create(
            model="gpt-4-vision-preview",
            messages=self.messages,
            temperature=1,
            max_tokens=650,
            top_p=1,
            frequency_penalty=0,
            presence_penalty=0,
        )

        assistant_message = response.choices[0].message.content
        self.messages.append({"role": "assistant", "content": assistant_message})

        return assistant_message


grade = "11"
primary_language = "English"
curriculum = "IB"
subject = "Languages"
student_name = "Jesai Tarun"
tutors_notes = "none"

chatbot = Chatbot(api_key="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")

# yay it works :)

# print(chatbot.get_response("Hello! Who are you?"))
print(chatbot.get_response("What do you know about me?"))

# print(chatbot.get_response("Hello! What is the capital of France?"))
# print(chatbot.get_response("What is it famous for?"))

# print(
#    chatbot.get_response(
#        "Hello! Can you explain this to me?", r"/Users/jesaitarun/Desktop/Flask/pic.jpg"
#    )
# )
