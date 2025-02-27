from flask import Flask, request, jsonify
from flask_cors import CORS

app = Flask(__name__)
CORS(app)  # Allow frontend to communicate with backend

# Secret Password
CORRECT_PASSWORD = "TF"

@app.route('/login', methods=['POST'])
def login():
    data = request.get_json()
    if data.get("password") == CORRECT_PASSWORD:
        return jsonify({"success": True})
    else:
        return jsonify({"success": False})

if __name__ == '__main__':
    app.run(debug=True)
