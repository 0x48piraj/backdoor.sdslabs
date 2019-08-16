## PCAP-me

Tags : `n00b19CTF`, `misc`

While developing an app, w1z4rd tested it on his localhost and we managed to get the pcap dump of the loopback requests he made to test his app. We think that he might not have made changes to the app when he deployed his app somewhere. Can you find the hidden information?

[PCAP](http://static.beast.sdslabs.co/static/PCAP-me/n00bctf.pcap)

Created by: Shaddy Garg

No. of Correct Submissions: 60

---

- Filtered for `POST` data (http.request.method == "POST")
- Found a pattern, grepped packet bytes with `psw=`
- Got hints such as : `uname=heypeople&psw=fakeflagflag` and `uname=please+see+the+pcap+file+carefully&psw=see+the+pcapcarefully`
- binwalk-ed the pcap, found gzip blobs.
- Used `-e` flag to extract blobs.
- Found a string saying "Congrats ..." followed by a url (http://n00bctf.herokuapp.com/)
- The URL pointed to a login page, tried `uname=admin&psw=givememyflag`
- Got the flag. (Here is your flag CTF{1_l0v3_wir3shark_4nd_pc4p_f1les})