<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Message</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div
        style="max-width: 600px; margin: auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; color: #333;">📬 New Contact Message</h2>
        <hr style="margin: 20px 0; border: none; border-top: 1px solid #ddd;">

        <p><strong style="color: #555;">Name:</strong> {{ $data['name'] }}</p>
        <p><strong style="color: #555;">Email:</strong> <a href="mailto:{{ $data['email'] }}"
                style="color: #3498db;">{{ $data['email'] }}</a></p>
        <p><strong style="color: #555;">Message:</strong></p>
        <p
            style="background: #f9f9f9; padding: 15px; border-left: 4px solid #3498db; color: #333; white-space: pre-line;">
            {{ $data['message'] }}
        </p>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #ddd;">
        <p style="text-align: center; color: #aaa; font-size: 12px;">
            This message was sent via the contact form on your website.
        </p>
    </div>
</body>

</html>
