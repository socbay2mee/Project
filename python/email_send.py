import time
import webbrowser
import os, subprocess
import re, serial
import smtplib
from email import Encoders
from email.MIMEMultipart import MIMEMultipart
from email.MIMEBase import MIMEBase
from email.MIMEText import MIMEText

def main():    
    UserName = "socbay2mee@gmail.com"
    Password = "socbay2me"
    Recipient = "thuanle.ute@gmail.com"
    
    msg = MIMEMultipart()
    msg['From'] = UserName
    msg['To'] = Recipient
    msg['Subject'] = "High temperature detected on " 
    text = "The house may be burning now. Temperature is: "
    msg.attach( MIMEText(text) ) 
    
    #part = MIMEBase("application", "octet-stream")
    #fo=open(file,"rb")
    #part.set_payload(fo.read() )
    #Encoders.encode_base64(part)
    #part.add_header('Content-Disposition', 'attachment; filename="%s"'  %os.path.basename(file))
    #msg.attach(part)
 
    s = smtplib.SMTP('smtp.gmail.com:587')
    s.ehlo()
    s.starttls()
    s.login(UserName, Password)
    s.sendmail(UserName, Recipient, msg.as_string())
    s.close()
if __name__ == "__main__":
    main()
 
