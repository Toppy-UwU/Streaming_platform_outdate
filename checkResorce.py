from flask import Flask, request, jsonify
import psutil
import os
import time

def create_app(test_config = None):
    app = Flask(__name__)

    @app.route('/server_resource/')
    def welcome():
        #CPU INFO
        cpu_used = psutil.cpu_percent()

        #Memory INFO [Ram Used]
        mem = psutil.virtual_memory().percent

        #Disk INFO
        disk_usage = psutil.disk_usage(os.getcwd())
        disk_total = round(disk_usage.total / (1024*1024*1024), 2)
        disk_used = round(disk_usage.used / (1024*1024*1024), 2)
        disk_free = round(disk_usage.free / (1024*1024*1024), 2)
        disk_used_percent = round(disk_usage.percent,2)

        #Network INFO
        inf = "Ethernet"
        net_stat = psutil.net_io_counters(pernic=True, nowrap=True)[inf]
        net_in_1 = net_stat.bytes_recv
        net_out_1 = net_stat.bytes_sent
        time.sleep(1)
        net_stat = psutil.net_io_counters(pernic=True, nowrap=True)[inf]
        net_in_2 = net_stat.bytes_recv
        net_out_2 = net_stat.bytes_sent

        net_in = round((net_in_2 - net_in_1) / 1024 / 1024, 3)
        net_out = round((net_out_2 - net_out_1) / 1024 / 1024, 3)

        return jsonify({'CPU_Used': str(cpu_used)+" %",
                  'Memory_Used' : str(mem)+" %",
                  'Disk_Total' : str(disk_total)+' GB',
                  'Disk_Used' : str(disk_used)+' GB',
                  'Disk_Free' : str(disk_free)+' GB',
                  'Disk_Used_Percent' : str(disk_used_percent)+' %',
                  'Network_Download' : str(net_in)+' MB/s',
                  'Network_Upload' : str(net_out)+' MB/s'})
    return app
APP = create_app()

if __name__ == '__main__':
    APP.run(host='0.0.0.0', port = 80, debug=True) #ip:5000/predict
    #APP.run(debug=True)