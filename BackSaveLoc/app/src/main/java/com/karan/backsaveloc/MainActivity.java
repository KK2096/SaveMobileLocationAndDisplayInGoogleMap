package com.karan.backsaveloc;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.DefaultRetryPolicy;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {

    EditText t1, t2;
    Button sButton;
    private  static  final  String url = "your hosting domain /loc_add.php";
    // eg https://locats.000webhostapp.com/
    
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        sButton = (Button) findViewById(R.id.btnSub);

         sButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                insertdata();
            }
        });
    }

    private void insertdata() {
        t1=(EditText)findViewById(R.id.t1);
        t2=(EditText)findViewById(R.id.t2);

        final String name = t1.getText().toString();
        final String phoneNo = t2.getText().toString();


            StringRequest request=new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response)
            {
                t1.setText("");
                t2.setText("");

                Toast.makeText(getApplicationContext(),response.toString(),Toast.LENGTH_LONG).show();
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(getApplicationContext(),error.toString(),Toast.LENGTH_LONG).show();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError
            {
                Map<String,String> param = new HashMap<String,String>();
                param.put("name",name);
                param.put("phoneNo",phoneNo);

                return param;
            }
        };


        RequestQueue queue= Volley.newRequestQueue(getApplicationContext());
        queue.add(request);

        Intent intent = new Intent(MainActivity.this, SecondActivity.class);
        intent.putExtra("name", name);
        intent.putExtra("phoneNo", phoneNo);
        startActivity(intent);
        finish();
    }

}