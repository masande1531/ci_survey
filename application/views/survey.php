  <?php echo form_open('survey/add_survey');
                ?>
               
                    <strong>Name : </strong><input id="name" type="text" name="name"/>
                    <strong>Company : </strong><input id="company" type="text" name="company"/>
                    <strong>Contact: </strong><input id="contact" type="text" name="contact"/><br/>
                    <strong>Email : </strong><input id="email" type="text" name="email"/>
                    <strong>Consultant : </strong><input id="consultant" type="text" name="consultant"/>
                    <hr/>
                    <p><strong>Please indicate your experience regarding communication</strong><br />
                        <input id="pink" type="radio" name="p_communication" value="Poor"  />Poor
                        <input id="blue" type="radio" name="p_communication" value="below Average"  />below Average
                        <input id="blue" type="radio" name="p_communication" value="Average"  />Average
                        <input id="blue" type="radio" name="p_communication" value="Good"  />Good
                        <input id="blue" type="radio" name="p_communication" value="Excellent"  />Excellent</p>
                    <p><strong>Please indicate experience regarding value of money</strong><br />
                        <input id="pink" type="radio" name="p_money" value="Poor"  />Poor
                        <input id="blue" type="radio" name="p_money" value="below Average"  />below Average
                        <input id="blue" type="radio" name="p_money" value="Average"  />Average
                        <input id="blue" type="radio" name="p_money" value="Good"  />Good
                        <input id="blue" type="radio" name="p_money" value="blue"  />Excellent</p>
                    <p><strong>Please rate your overall experience dealing with our company</strong><br />
                        <input id="pink" type="radio" name="p_company" value="Poor"  />Poor
                        <input id="blue" type="radio" name="p_company" value="below Average"  />below Average
                        <input id="blue" type="radio" name="p_company" value="Average"  />Average
                        <input id="blue" type="radio" name="p_company" value="Good"  />Good
                        <input id="blue" type="radio" name="p_company" value="Excellent"  />Excellent</p>
                    <p><strong>Would you recommend our services to anyone else</strong><br />
                        <input id="pink" type="radio" name="recommend" value="Yes"  />Yes
                        <input id="blue" type="radio" name="recommend" value="No"  />No	</p>
                    <p><strong>Please provide feedback or suggestions which could further help us improve our services.</strong><br />
                        <textarea name="feedback" id="feedback" rows="3" ></textarea></p>
                   <input type='submit' name='Submit' value='Submit' id="submit" />
                </form>

