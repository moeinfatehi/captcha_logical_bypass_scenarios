
# Captcha Logical Bypass Scenarios (Challenges)
This repository is a dockerized PHP application containing some captcha logical bypass challenges (scenarios).</br></br>
**OWASP References:**
* **Classification**: Web Application Security Testing > 04-Authentication Testing
* **WSTG**: Testing for Weak Lock Out Mechanism(<a href="https://owasp.org/www-project-web-security-testing-guide/v42/4-Web_Application_Security_Testing/04-Authentication_Testing/03-Testing_for_Weak_Lock_Out_Mechanism">WSTG-ATHN-03</a>)</br>
* **OTA**: CAPTCHA Defeat(<a href="https://owasp.org/www-project-automated-threats-to-web-applications/assets/oats/EN/OAT-009_CAPTCHA_Defeat">OAT-009</a>)</br>
# Bypass Techniques
The ideas behind challenges are:</br>
* Bypass using empty captcha
* Bypass by removing captcha parameter
* Bypass using the logical bug in generation and expiration of captcha
* Bypass using PHP type juggling
* Bypass captchas that are shown after specific number of wrong tries
* Bypass captchas that are shown after specific number of wrong tries from a specific IP (Website is behind WAF)

# Quick Start Using Docker
**Using docker hub (Quickest):**
1. To access the challenges, you need <a href="https://docs.docker.com/install">docker</a> installed.</br>
2. Run this command to pull and run the image from docker hub:</br>`sudo docker run -d -p 9002:80 moeinfatehi/captcha_logical_bypass_scenarios`
3. Access the challenges with this URL: <a href="http://localhost:9002">http://localhost:9002</a>


**Using docker-compose:**  
1. To access the challenges, you need <a href="https://docs.docker.com/install">docker</a> and <a href="https://docs.docker.com/compose/install/">docker-compose</a> installed.</br>
2. Clone the repository</br>`git clone https://github.com/moeinfatehi/captcha_logical_bypass_scenarios.git`
3. Open the main directory of the project (where docker-compose.yml file exists) and run: `docker-compose up`
4. Access the challenges with this URL: <a href="http://localhost:9002">http://localhost:9002</a>

# Disclaimer
This project is for educational purposes ONLY. The usual disclaimer applies, especially the fact that I'm not liable for any damages caused by the direct or indirect use of the information or functionality provided by these programs. The author or any Internet provider bears NO responsibility for content or misuse of these programs or any derivatives thereof. By using these projects you accept the fact that any damage (data loss, system crash, system compromise, etc.) caused by the use of this program is not my responsibility.

# Hack And Have Fun!
If you have any further questions, please don't hesitate to contact me via my <a href="https://twitter.com/MoeinFatehi">twitter</a> account.
