/*------ Program for Line Follower Robot using Arduino----- */
/*-------definning Inputs------*/
#define LS 2      // left sensor
#define RS 3      // right sensor
/*-------definning Outputs------*/
#define LM1 4       // left motor
#define LM2 5       // left motor
#define RM1 6       // right motor
#define RM2 7       // right motor
#define startFlag 12  // to start the bot from a signal from RPi
#define RPiOutput 11  // to signal RPi to stop the bot

bool deliveryFlag = true;
bool initialFlag = true; //Initially bot is at the station
  
void setup()
{
  pinMode(LS, INPUT);
  pinMode(RS, INPUT);
  pinMode(LM1, OUTPUT);
  pinMode(LM2, OUTPUT);
  pinMode(RM1, OUTPUT);
  pinMode(RM2, OUTPUT);
  pinMode(RPiOutput, OUTPUT);
  //pinMode(startFlag, OUTPUT);
  //digitalWrite(startFlag,LOW);
  pinMode(startFlag, INPUT);
  pinMode(13,OUTPUT);

  digitalWrite(RPiOutput,LOW);
}
void loop()
{
      
if(initialFlag==true && digitalRead(startFlag)==HIGH) //Initially move for 1 sec
  {
    //Move forward for 1 sec
      digitalWrite(LM1, HIGH);
      digitalWrite(LM2, LOW);
      digitalWrite(RM1, HIGH);
      digitalWrite(RM2, LOW);

      delay(1000);
      initialFlag=false;
  }
  if(digitalRead(startFlag)==HIGH)
  {
    digitalWrite(13,digitalRead(startFlag));

    if(!(digitalRead(LS)) && !(digitalRead(RS)))     // Move Forward
    {
      digitalWrite(LM1, HIGH);
      digitalWrite(LM2, LOW);
      digitalWrite(RM1, HIGH);
      digitalWrite(RM2, LOW);
    }
    
    if(digitalRead(LS) && !(digitalRead(RS)))     // Turn right
    {
      digitalWrite(LM1, LOW);
      digitalWrite(LM2, LOW);
      digitalWrite(RM1, HIGH);
      digitalWrite(RM2, LOW);
    }
    
    if(digitalRead(RS) && !(digitalRead(LS)))     // turn left
    {
      digitalWrite(LM1, HIGH);
      digitalWrite(LM2, LOW);
      digitalWrite(RM1, LOW);
      digitalWrite(RM2, LOW);
    }
    
    if(digitalRead(LS) && digitalRead(RS) && deliveryFlag)     // stop at patient
    {
      //at odd stop (patient)
      digitalWrite(LM1, LOW);
      digitalWrite(LM2, LOW);
      digitalWrite(RM1, LOW);
      digitalWrite(RM2, LOW);

      //wait for 15 sec
      delay(15000);

      //move forward for 1 sec
      digitalWrite(LM1, HIGH);
      digitalWrite(LM2, LOW);
      digitalWrite(RM1, HIGH);
      digitalWrite(RM2, LOW);
      delay(1000);
      
      deliveryFlag = false;
    }
    if(digitalRead(LS) && digitalRead(RS) && !deliveryFlag) //stop at station
    {
      //at even stop (station)
      digitalWrite(LM1, LOW);
      digitalWrite(LM2, LOW);
      digitalWrite(RM1, LOW);
      digitalWrite(RM2, LOW);
      digitalWrite(RPiOutput,HIGH);
      delay(2000);
      digitalWrite(RPiOutput,LOW); //A trigger of 2 sec
      
      deliveryFlag=true;
      initialFlag=true;
    }
  }
}
